<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;
use App\Profile;
use App\User;
use App\Income;

use Jenssegers\Date\Date;
Date::setLocale('th');

class DashboardController extends Controller
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
            if (Auth::user()->role == 'admin') {
                $products = Product::latest()->get();
                $orders = Order::latest()->get();
                $users = User::latest()->get();
                $soldOut = 0;
                $paid = 0;
                $checking = 0;
                $sent = 0;
                $completed = 0;
                $cancelled = 0;

                foreach ($products as $item) {
                    if($item->qty < 2){
                        $soldOut++;
                    }
                }

                foreach($orders as $item){
                    if($item->status == 'รอตรวจสอบ'){
                        $paid++;
                    }
                    if($item->status == 'รอจัดส่ง'){
                        $checking++;
                    }
                    if($item->status == 'จัดส่งแล้ว'){
                        $sent++;
                    }
                    if($item->status == 'ได้รับสินค้าแล้ว'){
                        $completed++;
                    }
                    if($item->status == 'ยกเลิก'){
                        $cancelled++;
                    }
                }
                $revenue = Income::where('income','>',0)->sum('income');
                $expenditure = Income::where('income','<',0)->sum('income')* -1;

                return view('admin.dashboard', compact('products','orders','soldOut','users','paid','checking','sent','completed','cancelled','revenue','expenditure'));

            }else{
                return redirect('home');
            }

        } catch (Exception $ex) {
            return $ex->getMessage();
        }


        // Status Order
        // 1. รอตรวจสอบ paid_at
        // 2. รอจัดส่ง checking_at
        // 3. จัดส่งแล้ว sent_at
        // 4. ได้รับสินค้าแล้ว completed_at
        // 5. ยกเลิก cancelled_at




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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
