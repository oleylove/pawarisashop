<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Order;
use App\OrderProduct;
use App\Product;
use App\Income;
Use PDF;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
Date::setLocale('th');


class OrderController extends Controller
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
            $perPage = 25;

            if (!empty($keyword)) {
                $order = Order::where('user_id', 'LIKE', "%$keyword%")
                    ->orWhere('tracking', 'LIKE', "%$keyword%")
                    ->orWhere('status', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $order = Order::latest()->paginate($perPage);
            }
            return view('order.index', compact('order'));
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
        //return view('order.create');
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
        // $requestData = $request->all();
        // Order::create($requestData);
        // return redirect('order')->with('flash_message', 'Order added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($po_id)
    {
        try {
            $perPage = 25;
            $orderproduct = OrderProduct::where('po_id', $po_id)->latest()->paginate($perPage);
            $order = Order::where('id', $po_id)->first();
            return view('order.order-product', compact('orderproduct','order'));
        } catch (Exception $ex) {
            return $ex->getMessage();
        }


        // $order = Order::findOrFail($id);
        // return view('order.show', compact('order'));
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
        // $order = Order::findOrFail($id);
        // return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        try {
            $requestData = $request->all();
            switch ($requestData['status']) {
                case 'รอจัดส่ง':
                    $income = Income::create([
                        'date' => Date::now(),
                        'income' => $requestData['net'],
                        'refer' => 'ขายสินค้า',
                    ]);
                    Order::where('id',$requestData['id'])->update([
                        'inc_id' => $income->id,
                        'status' => $requestData['status'],
                        'checking_at' => Date::now(),
                    ]);
                    $alert = 'ยืนยันคำสั่งซื่อเรียบร้อยแล้วคะ!';
                    break;

                case 'จัดส่งแล้ว':
                    $income = Income::create([
                        'date' => Date::now(),
                        'income' => $requestData['shipping'] * -1,
                        'refer' => 'จัดส่งสินค้า',
                    ]);
                    Order::where('id',$requestData['id'])->update([
                        'inc_id' => $income->id,
                        'status' => $requestData['status'],
                        'tracking' => $requestData['tracking'],
                        'sent_at' => Date::now(),
                    ]);
                    $alert = 'ยืนยันการจัดส่งสินค้าเรียบร้อยแล้วคะ!';
                    break;

                case 'ได้รับสินค้าแล้ว':
                    Order::where('id',$requestData['id'])->update([
                        'status' => $requestData['status'],
                        'consignee' => $requestData['consignee'],
                        'sent_at' => Date::now(),
                    ]);
                    $alert = 'ยืนยันการรับสินค้าเรียบร้อยแล้วคะ!';
                    break;
            }
            return redirect()->back()->with('success', $alert );
        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function cancel(Request $request)
    {
        try {
            Order::where('id',$request->po_id)->update([
                'status' => 'ยกเลิก',
                'cancelled_at' => Date::now(),
            ]);
            return redirect('order')->with('success', 'ยกเลิกคำสั่งซื้อเลขที่'.$request->po_id. 'เรียบร้อยแล้วคะ!' );
        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function showProduct($id)
    {
        try {
            $data = Product::findOrFail($id);
            return response()->json($data);

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
    public function destroy($id)
    {
        // Order::destroy($id);
        // return redirect('order')->with('flash_message', 'Order deleted!');
    }

    public function pdf_order_address($id)
    {
        try {
            $order = Order::findOrFail($id);
            $orderproduct = OrderProduct::where('po_id', $id)->latest()->get();

            $pdf = PDF::loadView('report.order-address',[
                'order' => $order,
                'orderproduct' => $orderproduct,
            ]);
            return $pdf->stream('rder-address.pdf');
        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

}
