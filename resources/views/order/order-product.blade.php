@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    รายการสินค้าคำสั่งซื่อ # {{ $order->id }}
                    @if (session('alert'))
                    <div class="alert alert-success">
                        {{ session('alert') }}
                    </div>
                    @endif
                </div>

                <div class="card-body">

                    <a href="{{ url('/order') }}" title="Back">
                        <button class="btn btn-warning btn-sm">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Back
                        </button>
                    </a>
                    <br />
                    <br />

                    <div class="row">
                        <div class="col-md-8">
                            <div class="table-responsive" id="dataOrderProduct">
                                <table class="table table-sm table table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ลำดับ</th>
                                            <th class="text-left">สินค้า</th>
                                            <th>ราคา</th>
                                            <th>จำนวน</th>
                                            <th>ราคารวม</th>
                                            <th>ส่วนลด</th>
                                            <th>จ่ายสุทธิ</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orderproduct as $item)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-left">{{ $item->product->name }}</td>
                                            <td>{{ number_format($item->product->price,2) }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ number_format($item->price,2) }}</td>
                                            <td>{{ number_format($item->disc,2) }}</td>
                                            <td>{{ number_format($item->net,2) }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm"
                                                    data-id="{{ $item->prod_id }}" id="OrderProduct"
                                                    path="{{ url('/') }}/storage/{{ $item->product->photo1 }}">
                                                    View
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination-wrapper">
                                    {!! $orderproduct->appends(['search' => Request::get('search')])->render() !!}
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header font-weight-bold">
                                    ที่อยู่ในการจัดส่งสินค้า
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p style="font-size: 15px; font-family: Sarabun;">{{ $order->address }}</p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="table-responsive" id="dataOrder">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <th>สรุปยอดคำสั่งซื้อ # {{ $order->id }}</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th> ยอดรวม</th>
                                            <td> ฿{{ number_format($order->price,2) }} </td>
                                        </tr>
                                        <tr>
                                            <th> ค่าจัดส่ง </th>
                                            <td> ฿{{ number_format($order->shipping,2) }} </td>
                                        </tr>
                                        <tr>
                                            <th> ส่วนลดจากร้าน </th>
                                            <td> ฿{{ number_format($order->disc,2) }} </td>
                                        </tr>
                                        <tr>
                                            <th> รวมจ่ายทั้งหมด </th>
                                            <th> ฿{{ number_format($order->net,2) }} </th>
                                        </tr>
                                        <tr>
                                            <th> สถานะคำสั่งซื้อ </th>
                                            <th> {{ $order->status  }} </th>
                                        </tr>
                                        @switch($order->status)
                                        @case('รอตรวจสอบ')
                                        <tr>
                                            <th>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    data-id="{{ $order->id }}" id="slipOrder"
                                                    data-price="{{ $order->price }}"
                                                    data-img="{{ $order->slip }}"
                                                    data-status="{{ $order->status }}">
                                                    {{ $order->status }}
                                                </button>
                                                <div class="spinner-border text-warning spinner-border-sm"
                                                    role="status"></div>
                                            </th>
                                            <th>
                                                <form method="POST" action="{{ route('cancel.order')}}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('PATCH') }}
                                                    {{ csrf_field() }}
                                                    <input type="hidden" id="po_id" name="po_id"
                                                        value="{{ $order->id }}">
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Order"
                                                        onclick="return confirm(&quot;คุณแน่ใช่ใช่หรือไม่ว่าต้องการยกเลิกคำสั่งซื้อนี้ ??&quot;)">
                                                        ยกเลิกคำสั่งซื้อ
                                                    </button>
                                                </form>
                                            </th>
                                        </tr>
                                        @break
                                        @case('รอจัดส่ง')
                                        <form method="POST" action="{{ route('update.order') }}" accept-charset="UTF-8"
                                            class="form-horizontal was-validated" enctype="multipart/form-data"
                                            id="FormSlipOrder">
                                            {{ method_field('PATCH') }}
                                            {{ csrf_field() }}
                                            <tr>
                                                <td colspan="2">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="tracking">เลขพัสดุ</span>
                                                        </div>
                                                        <input type="text" class="form-control is-invalid" id="tracking"
                                                            name="tracking" placeholder="Tracking" required>
                                                    </div>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"
                                                                id="tracking">ค่าจัดส่ง </span>
                                                        </div>
                                                        <input type="number" class="form-control is-invalid" id="shipping"
                                                            name="shipping" placeholder="Shipping" min="1" required>
                                                    </div>
                                                    <input type="hidden" id="id" name="id" class="d-none"
                                                        value="{{ $order->id }}">
                                                    <input type="hidden" id="status" name="status" class="d-none"
                                                        value="จัดส่งแล้ว">
                                                    <button class="btn btn-success btn-block ml-1" type="submit">ยืนยันการจัดส่ง</button>
                                                    <a href="{{ url('order-address').'/'.$order->id }}" class="btn btn-info btn-block ml-1" target="_blank">พิมพ์ที่อยู่</a>
                                                </td>
                                            </tr>
                                        </form>
                                        @break
                                        @case('จัดส่งแล้ว')
                                        <form method="POST" action="{{ route('update.order') }}" accept-charset="UTF-8"
                                            class="form-horizontal was-validated" enctype="multipart/form-data"
                                            id="FormSlipOrder">
                                            {{ method_field('PATCH') }}
                                            {{ csrf_field() }}
                                            <tr>
                                                <td colspan="2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="tracking">คนรับของ</span>
                                                        </div>
                                                        <input type="hidden" id="id" name="id" class="d-none"
                                                            value="{{ $order->id }}">
                                                        <input type="hidden" id="status" name="status" class="d-none"
                                                            value="ได้รับสินค้าแล้ว">
                                                        <input type="text" class="form-control is-invalid"
                                                            id="consignee" name="consignee" placeholder="Consignee"
                                                            aria-describedby="consignee" required>
                                                        <button class="btn btn-success ml-1"
                                                            type="submit">ยืนยัน</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </form>
                                        @break
                                        @case('ได้รับสินค้าแล้ว')
                                        <tr>
                                            <th> หมายเลขพัสดุ </th>
                                            <td> {{ $order->tracking  }} </td>
                                        </tr>
                                        <tr>
                                            <th> คนรับของ </th>
                                            <td> {{ $order->consignee  }} </td>
                                        </tr>
                                        @break
                                        @endswitch
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

<!-- modal sho slip order and confirm order -->
@include('admin.modal-slip-order')

@include('admin.modal-order-product')

@endsection
