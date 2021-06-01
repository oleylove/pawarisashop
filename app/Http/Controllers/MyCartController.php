<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\OrderProduct;
use App\Profile;
use App\Config;

class MyCartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $config = Config::first();
            $orderproduct = OrderProduct::whereNull('po_id')->where('user_id', Auth::id())->latest()->get();
            $profile = Profile::where('user_id', Auth::id())->where('status','จัดส่ง')->first();
            return view('cart', compact('orderproduct','profile','config'));

        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $prod_id = $request->get('prod_id');
            $product = Product::where('id',$prod_id)->first();
            if ($product) {
                $requestData['user_id'] = Auth::id();
                $requestData['prod_id'] = $product->id;
                $requestData['qty'] = 1;
                $requestData['price'] = $product->price;
                $requestData['disc'] = $product->disc;
                $requestData['net'] = $product->price - $product->disc;

                $orderProduct = OrderProduct::whereNull('po_id')
                    ->where('user_id', Auth::id())
                    ->where('prod_id',$prod_id)
                    ->first();

                if ($product->qty > 0) {
                    if ($orderProduct) {
                        $qty = $orderProduct->qty + 1 ;
                        $price = $qty * $product->price;
                        $disc = $qty * $product->disc;
                        $net =  $price - $disc;

                        OrderProduct::where('id', $orderProduct->id)
                            ->update([
                                'qty' => $qty,
                                'price' => $price,
                                'disc' => $disc,
                                'net' => $net
                            ]);

                    } else {
                        OrderProduct::create($requestData);
                    }

                    Product::where('id',$prod_id)->decrement('qty', 1);
                    return response()->json(['success'=>'เพิ่มสินค้าลงตระกร้าสินค้าเรียบร้อยแล้วคะ!']);
                }
            }

        } catch (Exception $ex) {

            return response()->json(['success'=> 'Error '.$ex->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $requestData = $request->all();
            $orderproduct = OrderProduct::whereNull('po_id')->where('user_id', Auth::id())->latest()->get();

            foreach($orderproduct as $item){
                $product = Product::where('id',$item->prod_id)->first();
                if ($product->qty > $requestData['qty'.$item->id]) {
                    $carts = OrderProduct::whereNull('po_id')->where('user_id', Auth::id())->where('id', $requestData['id'.$item->id])
                            ->update([
                                'qty' => $requestData['qty'.$item->id],
                                'price' => $requestData['qty'.$item->id] * $item->product->price,
                                'disc' => $requestData['qty'.$item->id] * $item->product->disc,
                                'net' => ($requestData['qty'.$item->id] * $item->product->price) - ($requestData['qty'.$item->id] * $item->product->disc),
                            ]);
                    //ปรับลดสินค้าในสต๊อก
                    $qty = $product->qty + $requestData['qty_old'.$item->id] - $requestData['qty'.$item->id];
                    Product::where('id',$product->id)->update(['qty'=> $qty]);
                }
            }
            return redirect()->back()->with('alert', 'แก้ไขสินค้าในตระกร้าสินค้าเรียบร้อยแล้วคะ!');
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $orderproduct = OrderProduct::where('id',$id)->whereNull('po_id')->where('user_id', Auth::id())->first();
            //คืนสินค้าในสต๊อก
            Product::where('id',$orderproduct->prod_id)->increment('qty',$orderproduct->qty);
            OrderProduct::destroy($id);
            return redirect()->back()->with('alert', 'ลบสินค้าในตระกร้าสินค้าเรียบร้อยแล้วคะ!');
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
}
