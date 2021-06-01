<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Income;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
Date::setLocale('th');

class IncomeController extends Controller
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
            $search = $request->get('search');
            $begin = $request->get('begin');
            $end = $request->get('end');
            $perPage = 15;

            if (!empty($search)) {
                switch ($search) {
                    case 'รายรับ':
                        $income = Income::where('income','>',0)->latest()->paginate($perPage);
                    break;
                    case 'รายจ่าย':
                        $income = Income::where('income','<',0)->latest()->paginate($perPage);
                    break;
                    case 'ขายสินค้า':
                        $income = Income::where('refer', $search)->latest()->paginate($perPage);
                    break;
                    case 'ซื้อสินค้า':
                        $income = Income::where('refer', $search)->latest()->paginate($perPage);
                    break;
                    case 'จัดส่งสินค้า':
                        $income = Income::where('refer', $search)->latest()->paginate($perPage);
                    break;
                    case 'อื่นๆ':
                        $income = Income::where('refer', $search)->latest()->paginate($perPage);
                    break;
                    default:
                        $income = Income::latest()->paginate($perPage);
                    break;
                }
            } elseif (!empty($begin) && !empty($end)){

                $income = Income::whereBetween('date', [$begin, $end])->latest()->paginate($perPage);

            } else {

                $income = Income::latest()->paginate($perPage);
            }

            $revenue = Income::where('income','>',0)->sum('income');
            $sale = Income::where('refer','ขายสินค้า')->sum('income');
            $other_rev = Income::where('refer','อื่นๆ')->where('income','>',0)->sum('income');

            $expenditure = Income::where('income','<',0)->sum('income')* -1;
            $buy = Income::where('refer','ซื้อสินค้า')->sum('income')* -1;
            $shipping = Income::where('refer','จัดส่งสินค้า')->sum('income')* -1;
            $other_exp = Income::where('refer','อื่นๆ')->where('income','<',0)->sum('income')* -1;

            return view('income.index', compact('income','revenue','expenditure','sale','buy','shipping','other_rev','other_exp'));

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
            return view('income.create');
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
    public function store_update(Request $request)
    {
        try {
            $requestData = $request->all();
            $message = '';
            if($requestData['remark'] == 'รายรับ'){
                if($requestData['income'] < 0){
                    $requestData['income'] = $requestData['income'] * -1;
                }else{
                    $requestData['income'] = $requestData['income'];
                }
            }else{
                $requestData['income'] = $requestData['income'] * -1;
            }
            if (empty($requestData['id'])) {

                $requestData['date'] = Date::now();
                Income::create($requestData);
                $message = 'บันทึกบัญชี! '.$requestData['remark']. ' ของ '.$requestData['refer'] . ' เรียบร้อยแล้วคะ!';
            }else{

                $income = Income::findOrFail($requestData['id']);
                $income->update($requestData);
                $message =  'แก้ไขบัญชี! '.$requestData['remark']. ' ของ '.$requestData['refer'] . ' เรียบร้อยแล้วคะ!';
            }
            return redirect('income')->with('alert', $message);
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
        // $income = Income::findOrFail($id);

        // return view('income.show', compact('income'));
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
            $data = Income::findOrFail($id);
            return response()->json($data);
        } catch (Exception $ex) {
            return $ex->getMessage();
        }


        //return view('income.edit', compact('income'));
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

        // $requestData = $request->all();

        // $income = Income::findOrFail($id);
        // $income->update($requestData);

        // return redirect('income')->with('flash_message', 'Income updated!');
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
        // Income::destroy($id);

        // return redirect('income')->with('flash_message', 'Income deleted!');
    }
}
