<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\OrderProduct;
use App\Order;
use App\Profile;
use Jenssegers\Date\Date;
Date::setLocale('th');
use Image;

class MyCheckoutController extends Controller
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
    public function index(Request $request)
    {
        try {
            $order = Order::where('user_id', Auth::id())->latest()->get();

            $orderProduct = OrderProduct::whereNotNull('po_id')
                ->where('user_id', Auth::id())->latest()->get();

            $paid = Order::where('user_id', Auth::id())->where('status','รอตรวจสอบ')
                ->latest()->get();

            $checking = Order::where('user_id', Auth::id())->where('status','รอจัดส่ง')
                ->latest()->get();

            $sent = Order::where('user_id', Auth::id())->where('status','จัดส่งแล้ว')
                ->latest()->get();

            $completed = Order::where('user_id', Auth::id())->where('status','ได้รับสินค้าแล้ว')
                ->latest()->get();

            $cancelled = Order::where('user_id', Auth::id())->where('status','ยกเลิก')
                ->latest()->get();
            return view('checkout', compact('orderProduct','paid','checking','sent','completed','cancelled','order'));
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $requestData = $request->all();
            //รวมราคาสินค้าในตะกร้า
            $orderProduct = OrderProduct::whereNull('po_id')->where('user_id', Auth::id())->get();
            //กำหนดราคารวม, ผู้ใช้, สถานะ
            $profile = Profile::where('user_id', Auth::id())->where('status','จัดส่ง')->first();
            $shipping = $requestData['shipping'];
            //CREATE ORDER
            if ($request->hasFile('slip')) {
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'shipping' => $shipping,
                    'price' => $orderProduct->sum('price'),
                    'disc' => $orderProduct->sum('disc'),
                    'net' => $orderProduct->sum('net') + $shipping,
                    'slip' => $requestData['slip'],
                    'status' => "รอตรวจสอบ",
                    'paid_at' =>  Date::now(),
                    'address' => 'ชื่อ ' . $profile->name .  ' ที่อยู่ : ' . $profile->address .' โทร. ' . $profile->phone
                ]);
                $destinationPath = public_path('storage/slips');
                $slip = $request->file('slip');
                $slip_name = $order->id . '-slip'.time().'.' . $slip->getClientOriginalExtension();
                Image::make($slip)->save($destinationPath . '/' . $slip_name);
                $requestData['slip'] = 'slips/'.$slip_name;
                Order::where('id',$order->id)
                    ->update([
                        'slip' =>  $requestData['slip']
                    ]);

            }
            //UPDATE ORDER ID ในตาราง order_product สำหรับคอลัมน์ที่ po_id เป็น null
            OrderProduct::whereNull('po_id')->where('user_id', Auth::id())->update(['po_id'=> $order->id]);
            //ปรับลดสินค้าในสต๊อก
            // $order_products = $order->order_products;
            // foreach($order_products as $item)
            // {
            //     Product::where('id',$item->prod_id)->decrement('qty', $item->qty);
            // }
            return redirect('mycheckout')->with('alert', 'สั่งซื้อสินค้าสินค้าเรียบร้อยแล้วคะ!');
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $order = Order::where('id',$id)->where('user_id', Auth::id())->first();
            $orderProduct = OrderProduct::whereNotNull('po_id')
                ->where('po_id',$id)
                ->where('user_id', Auth::id())
                ->latest()->get();
            return view('checkout-detail', compact('orderProduct','order'));
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
}
