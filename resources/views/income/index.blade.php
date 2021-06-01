@extends('layouts.app')
@section('title', 'Pawarisa-Shop | Admin Income')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    บัญชีร้าน KhaoPan Shop
                    @if (session('alert'))
                    <div class="alert alert-success">
                        {{ session('alert') }}
                    </div>
                    @endif

                    @if (session('alertFail'))
                    <div class="alert alert-danger">
                        {{ session('alertFail') }}
                    </div>
                    @endif

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto text-right" id="btnAddIncome">
                            <a href="javascript:void(0)" class="btn btn-success btn-sm my-2" title="เพิ่มรายการบัญชี"
                                id="addIncome">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                เพิ่ม
                            </a>

                            <a href="{{ url('/income?search=รายรับ') }}" class="btn btn-primary btn-sm my-2"
                                title="รายรับ">
                                รายรับ
                            </a>
                            <a href="{{ url('/income?search=รายจ่าย') }}" class="btn btn-danger btn-sm my-2"
                                title="รายจ่าย">
                                รายจ่าย
                            </a>
                            <a href="{{ url('/income?search=ค่าขายสินค้า') }}" class="btn btn-success btn-sm my-2"
                                title="ค่าขายสินค้า">
                                ค่าขายสินค้า
                            </a>
                            <a href="{{ url('/income?search=ค่าซื้อสินค้า') }}" class="btn btn-success btn-sm my-2"
                                title="ค่าซื้อสินค้า">
                                ค่าซื้อสินค้า
                            </a>
                            <a href="{{ url('/income?search=ค่าจัดส่ง') }}" class="btn btn-success btn-sm my-2"
                                title="ค่าจัดส่ง">
                                ค่าจัดส่ง
                            </a>
                            <a href="{{ url('/income?search=อื่นๆ') }}" class="btn btn-secondary btn-sm my-2"
                                title="ค่าจัดส่ง">
                                อื่นๆ
                            </a>
                            <a href="{{ url('/income') }}" class="btn btn-info btn-sm my-2" title="ค่าจัดส่ง">
                                ทั้งหมด
                            </a>
                        </div>
                        <div class="col-md-6 mb-2">
                            <form method="GET" action="{{ url('/income') }}" accept-charset="UTF-8"
                                class="form-inline my-2 my-lg-0 float-right" role="search">
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">จาก</div>
                                            </div>
                                            <input type="date" class="form-control" id="begin" name="begin"
                                                value="{{ request('begin') }}" placeholder="วันที่" required>
                                        </div>
                                    </div>
                                    <div class="col-auto my-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">ถึง</div>
                                            </div>
                                            <input type="date" class="form-control" id="end" name="end"
                                                value="{{ request('end') }}" placeholder="วันที่" required>
                                            <span class="input-group-append">
                                                <button class="btn btn-success" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm" id="dtatIncome">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ลำดับ</th>
                                            <th>วันที่</th>
                                            <th>รายรับ-รายจ่าย</th>
                                            <th class="text-left">Remark</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($income as $item)
                                        <tr class="text-center">
                                            <td>
                                                {{ ($income ->currentpage()-1) * $income ->perpage() + $loop->index + 1 }}
                                            </td>
                                            <td>{{ get_dmY($item->date) }}</td>
                                            <td>
                                                @if ($item->income < 0) {{ number_format($item->income * -1,2) }} @else
                                                    {{ number_format($item->income,2) }} @endif </td> <td
                                                    class="text-left">{{ $item->refer }}</td>
                                            <td>
                                                {{-- <a href="{{ url('/income/' . $item->id . '/edit') }}"
                                                title="Edit Income">
                                                <button class="btn btn-danger btn-sm">
                                                    Edit
                                                </button>
                                                </a> --}}
                                                <a href="javascript:void(0)" data-id="{{ $item->id }}" id="editIncome"
                                                    title="แก้ไขบัญชี">
                                                    <button class="btn btn-danger btn-sm">
                                                        Edit
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination-wrapper">
                                    {!! $income->appends(['search' => Request::get('search')])->render() !!}
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">สรุปบัญชีร้าน</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2"><u>รายรับ<u></th>
                                        </tr>
                                        <tr class="table-borderless">
                                            <th><span class="ml-4"> ขายสินค้า </span></th>
                                            <td> {{number_format($sale,2) .' บาท'}} </td>
                                        </tr>
                                        <tr class="table-borderless">
                                            <th><span class="ml-4"> อื่นๆ </span></th>
                                            <td> {{number_format($other_rev,2).' บาท' }} </td>
                                        </tr>
                                        <tr>
                                            <th colspan="2"><u>รายจ่าย</u></th>
                                        </tr>
                                        <tr class="table-borderless">
                                            <th><span class="ml-4"> ค่าซื้อสินค้า </span></th>
                                            <td> {{number_format($buy,2) .' บาท'}} </td>
                                        </tr class="table-borderless">
                                        <tr class="table-borderless">
                                            <th><span class="ml-4"> ค่าส่งสินค้า </span></th>
                                            <td> {{number_format($shipping,2) .' บาท'}} </td>
                                        </tr>
                                        <tr class="table-borderless">
                                            <th><span class="ml-4"> อื่นๆ </span></th>
                                            <td> {{number_format($other_exp,2) .' บาท'}} </td>
                                        </tr>
                                        <tr>
                                            <th>รวมรายรับ</th>
                                            <th> {{number_format($revenue,2) .' บาท'}} </th>
                                        </tr>
                                        <tr class="table-borderless">
                                            <th>รวมรายจ่าย</th>
                                            <th> {{number_format($expenditure,2).' บาท' }} </th>
                                        </tr>
                                        <tr class="table-borderless">
                                            <th>ผลกำไร</th>
                                            <th> {{number_format($revenue - $expenditure,2) .' บาท'}} </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include ('admin.modal-income')

@endsection
