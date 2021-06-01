@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    ราการคำสั่งซื้อสินค้าทั้งหมดของร้าน
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <a href="{{ url('/order') }}" class="btn btn-info mr-2 mb-2"
                                title="ทั้งหมด">
                                ทั้งหมด
                            </a>

                            <a href="{{ url('/order?search=รอตรวจสอบ') }}" class="btn btn-warning mr-2 mb-2"
                                title="รอตรวจสอบ">
                                รอตรวจสอบ
                            </a>
                            <a href="{{ url('/order?search=รอจัดส่ง') }}" class="btn btn-danger mr-2 mb-2"
                                title="รอจัดส่ง">
                                รอจัดส่ง
                            </a>
                            <a href="{{ url('/order?search=จัดส่งแล้ว') }}" class="btn btn-primary mr-2 mb-2"
                                title="จัดส่งแล้ว">
                                จัดส่งแล้ว
                            </a>
                            <a href="{{ url('/order?search=ได้รับสินค้าแล้ว') }}" class="btn btn-success mr-2 mb-2"
                                title="ได้รับสินค้าแล้ว">
                                ได้รับสินค้าแล้ว
                            </a>
                            <a href="{{ url('/order?search=ยกเลิก') }}" class="btn btn-secondary mb-2" title="ยกเลิก">
                                ยกเลิก
                            </a>
                        </div>
                        <div class="col-md-3">
                            <form method="GET" action="{{ url('/order') }}" accept-charset="UTF-8"
                                class="form-inline my-2 my-lg-0 float-right" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..."
                                        value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" id="dataOrder">
                            <thead>
                                <tr class="text-center">
                                    <th>ลำดับ</th>
                                    <th>รหัส</th>
                                    <th>เวลาสั่งซื้อ</th>
                                    <th>ยอดรวม</th>
                                    <th>สถานะคำสั่งซื้อ</th>
                                    <th>เลขพัสดุ</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $item)
                                <tr class="text-center">
                                    <td>
                                        {{ ($order ->currentpage()-1) * $order ->perpage() + $loop->index + 1 }}
                                    </td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->paid_at }}</td>
                                    <td>{{ number_format($item->net,2) }}</td>
                                    <td>
                                        @switch($item->status)
                                        @case('รอตรวจสอบ')
                                        <button type="button" class="btn btn-warning btn-sm" data-id="{{ $item->id }}"
                                            id="slipOrder" data-img="{{ $item->slip }}" data-net="{{ $item->net }}"
                                            data-status="{{ $item->status }}">
                                            {{ $item->status }}
                                        </button>
                                        <div class="spinner-border text-warning spinner-border-sm" role="status"></div>
                                        @break
                                        @case('รอจัดส่ง')
                                        <button type="button" class="btn btn-danger btn-sm" data-id="{{ $item->id }}"
                                            id="slipOrder" data-img="{{ $item->slip }}"
                                            data-status="{{ $item->status }}">
                                            {{ $item->status }}
                                        </button>
                                        <div class="spinner-border text-danger spinner-border-sm" role="status"></div>
                                        @break
                                        @case('จัดส่งแล้ว')
                                        <button type="button" class="btn btn-primary btn-sm" data-id="{{ $item->id }}"
                                            id="slipOrder" data-img="{{ $item->slip }}"
                                            data-status="{{ $item->status }}">
                                            {{ $item->status }}
                                        </button>
                                        <div class="spinner-border text-primary spinner-border-sm" role="status"></div>
                                        @break
                                        @case('ได้รับสินค้าแล้ว')
                                        <button type="button" class="btn btn-success btn-sm">
                                            {{ $item->status }}
                                        </button>
                                        @break
                                        @case('ยกเลิก')
                                        <button type="button" class="btn btn-secondary btn-sm">
                                            {{ $item->status }}
                                        </button>
                                        @break
                                        @endswitch
                                    </td>
                                    <td>{{ $item->tracking }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/order-product/' . $item->id) }}" title="View Order">
                                            <button class="btn btn-info btn-sm">
                                                ดูรายการ
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper">
                            {!! $order->appends(['search' => Request::get('search')])->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal sho slip order and confirm order -->
@include('admin.modal-slip-order')

@endsection
