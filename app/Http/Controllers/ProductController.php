<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use App\Product;
use App\Income;
use App\Order;
use App\OrderProduct;
use Jenssegers\Date\Date;
Date::setLocale('th');

class ProductController extends Controller
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
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        try {
            $keyword = $request->get('search');
            $perPage = 10;
            $productCount = Product::count();
            if (!empty($keyword)) {
                switch ($keyword) {
                    case 'สินค้าใกล้หมด':
                        $product = Product::where('qty', '<', '2')->oldest()->paginate($perPage);
                        break;

                    case 'สินค้าลดราคา':
                        $product = Product::where('disc', '>', '0')->oldest()->paginate($perPage);
                        break;

                    case 'สินค้ายกเลิกขาย':
                        $product = Product::where('status','ยกเลิกขาย')->oldest()->paginate($perPage);
                        break;

                    default:
                    $product = Product::where('title', 'LIKE', "%$keyword%")
                        ->orWhere('name', 'LIKE', "%$keyword%")->oldest()->paginate($perPage);
                        break;
                }
            } else {
                $product = Product::latest()->paginate($perPage);
            }
            return view('product.index', compact('product','productCount'));
        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        try {

            return view('product.create');

        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            $requestData = $request->all();
            $income = Income::create([
                'date' => Date::now(),
                'income' => $requestData['cost'] * $requestData['qty'] * -1,
                'refer' => 'ซื้อสินค้า',
            ]);
            $requestData['inc_id'] = $income->id;
            $product = Product::create($requestData);

            $destinationPath = public_path('storage/products');
            if ($request->hasFile('photo1')) {
                $photo1 = $request->file('photo1');
                $photo1_name = $product->id . '-photo1.' . $photo1->getClientOriginalExtension();
                Image::make($photo1)->resize(350, 400)->save($destinationPath . '/' . $photo1_name);
                $requestData['photo1'] = 'products/'.$photo1_name;

            }
            if ($request->hasFile('photo2')) {
                $photo2 = $request->file('photo2');
                $photo2_name = $product->id . '-photo2.' . $photo2->getClientOriginalExtension();
                Image::make($photo2)->resize(350, 400)->save($destinationPath . '/' . $photo2_name);
                $requestData['photo2'] = 'products/'.$photo2_name;
            }
            if ($request->hasFile('photo3')) {
                $photo3 = $request->file('photo3');
                $photo3_name = $product->id . '-photo3.' . $photo3->getClientOriginalExtension();
                Image::make($photo3)->resize(350, 400)->save($destinationPath . '/' . $photo3_name);
                $requestData['photo3'] = 'products/'.$photo3_name;
            }

            $product = Product::findOrFail($product->id);
            $product->update($requestData);
            return redirect('product')->with('success', 'เพิ่มรายการสินค้าใหม่เรียบน้อยแล้วคะ!');

        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
            return view('product.show', compact('product'));
        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        try {
            $product = Product::findOrFail($id);
            return view('product.edit', compact('product'));
        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        try {
            $requestData = $request->all();
            $destinationPath = public_path('storage/products');
            // update Photo1
            if ($request->hasFile('photo1')) {
                if(Storage::exists('public/'.$request['photo1_old'])){
                    Storage::delete('public/'.$request['photo1_old']);
                }
                $photo1 = $request->file('photo1');
                $photo1_name = $id . '-photo1.' . $photo1->getClientOriginalExtension();
                Image::make($photo1)->resize(350, 400)->save($destinationPath . '/' . $photo1_name);
                $requestData['photo1'] = 'products/'.$photo1_name;
            }
            // update Photo2
            if ($request->hasFile('photo2')) {
                if(Storage::exists('public/'.$request['photo2_old'])){
                    Storage::delete('public/'.$request['photo2_old']);
                }
                $photo2 = $request->file('photo2');
                $photo2_name = $id . '-photo2.' . $photo2->getClientOriginalExtension();
                Image::make($photo2)->resize(350, 400)->save($destinationPath . '/' . $photo2_name);
                $requestData['photo2'] = 'products/'.$photo2_name;
            }
            // update Photo2
            if ($request->hasFile('photo3')) {
                if(Storage::exists('public/'.$request['photo3_old'])){
                    Storage::delete('public/'.$request['photo3_old']);
                }
                $photo3 = $request->file('photo3');
                $photo3_name = $id . '-photo3.' . $photo3->getClientOriginalExtension();
                Image::make($photo3)->resize(350, 400)->save($destinationPath . '/' . $photo3_name);
                $requestData['photo3'] = 'products/'.$photo3_name;
            }

            // update to database
            $product = Product::findOrFail($id);
            $product->update($requestData);
            return redirect('product')->with('success', 'แก้ไขรายการสินค้าใหม่เรียบน้อยแล้วคะ!');

        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, $id)
    {
        try {
            $OrderProduct = OrderProduct::where('prod_id',$id)->get();
            $num = 0;
            if($request->status == 'ยกเลิกขาย'){
                foreach($OrderProduct as $item){
                    $Order = Order::where('id',$item->po_id)->where('status','รอตรวจสอบ')->first();
                    if($Order){
                        $num++;
                    }
                }
                if($num == 0){
                    Product::where('id', $id)
                        ->update([
                            'status' => 'ยกเลิกขาย',
                            'updated_at' => Date::now(),
                        ]);
                    return redirect()->back()->with('success', 'ยกเลิกการขายสินค้ารายการนี้เรียบน้อยแล้วคะ!');
                }else {
                    return redirect()->back()->with('fail', 'ผิดพลาด? ยกเลิกการขายสินค้านี้ไม่ได้เนื่องจากมีการสั่งสินค้าที่รอตรวจสอบ!');
                }
            }else{
                Product::where('id', $id)
                ->update([
                    'status' => 'ขาย',
                    'updated_at' => Date::now(),
                ]);
                return redirect()->back()->with('success', 'กลับมาขายสินค้ารายการนี้เรียบน้อยแล้วคะ!');
            }
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
}
