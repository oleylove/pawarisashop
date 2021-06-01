@extends('layouts.dailyshop')

@section('title','Pawarisa Shop | My Cart')

@section('content')

<!-- Cart view section -->
<section id="cart-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cart-view-area">
                    <div class="cart-view-table">
                        @if (session('alert'))
                        <div class="alert alert-success">
                            {{ session('alert') }}
                        </div>
                        @endif

                        @if ($orderproduct->count())
                        <form method="POST" action="{{ url('order-product-mycart-update') }}" accept-charset="UTF-8"
                            class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รูปสินค้า</th>
                                            <th>สินค้า</th>
                                            <th>สี</th>
                                            <th>ขนาด</th>
                                            <th>ราคา/ชิ้น</th>
                                            <th>เหลืออยู่</th>
                                            <th>ส่วนลด/ชิ้น</th>
                                            <th>จำนวน</th>
                                            <th>ราคารวม</th>
                                            <th>ยกเลิก</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orderproduct as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="javascript:void(0)">
                                                    @if (Storage::exists('public/'.$item->product->photo1))
                                                    <img src="{{ url('/') }}/storage/{{ $item->product->photo1 }}">
                                                    @else
                                                        @if (Storage::exists('public/'.$item->product->photo2))
                                                        <img src="{{ url('/') }}/storage/{{ $item->product->photo2 }}">
                                                        @else
                                                            @if (Storage::exists('public/'.$item->product->photo3))
                                                            <img src="{{ url('/') }}/storage/{{ $item->product->photo3 }}">
                                                            @else
                                                            <img src="{{ url('/') }}/storage/products/404.jpg">
                                                            @endif
                                                        @endif
                                                    @endif
                                                </a>
                                            </td>
                                            <td>
                                                <a class="aa-cart-title" href="javascript:void(0)"
                                                    data-toggle2="tooltip" data-placement="top" data-toggle="modal"
                                                    data-id="{{ $item->product->id }}" id="ShowModelProduct">
                                                    {{ $item->product->name }}
                                                </a>
                                            </td>
                                            <td>{{ $item->product->color }}</td>
                                            <td>{{ $item->product->size }}</td>
                                            <td>{{ number_format($item->product->price,2) }}</td>
                                            <td>{{ $item->product->qty }}</td>
                                            <td>{{ number_format($item->product->disc,2) }}</td>
                                            <td>
                                                <input type="hidden" name="id{{ $item->id }}" id="id{{ $item->id }}"
                                                    value="{{ $item->id }}">

                                                <input type="hidden" name="qty_old{{ $item->id }}"
                                                    id="qty_old{{ $item->id }}" value="{{ $item->qty }}">

                                                <input class="aa-cart-quantity" type="number" name="qty{{ $item->id }}"
                                                    id="qty{{ $item->id }}" value="{{ $item->qty }}" min="1">
                                            </td>
                                            <td>{{ number_format($item->net,2) }}</td>
                                            <td>
                                                <a class="remove" href="{{ url('mycart-delete/'. $item->id) }}">
                                                    <i class="far fa-times-circle" style="font-size: 24px;"></i>
                                                </a>
                                                <input type="hidden" name="prod_id" id="prod_id"
                                                    value="{{ $item->prod_id }}">
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="10" class="aa-cart-view-bottom">
                                                <div class="row">
                                                    <div class="col-md-10 text-left float-felt">
                                                        <div class="checkout-right">
                                                            @if ($profile)
                                                            <label>ที่อยู่ในการจัดส่งสินค้า : </label>
                                                            <div class="">
                                                                <label>ชื่อ : {{ $profile->name }}</label>
                                                                <label>ที่อยู่ : {{ $profile->address }}</label>
                                                                <label>โทร : {{ $profile->phone }}</label>
                                                            </div>
                                                            @else
                                                            <label>ยังไม่มีที่อยู่ที่ในการจัดส่ง <a
                                                                    href="{{ url('myaccount') }}" style="color: red"><i
                                                                        class="fas fa-plus-circle"></i>เพิ่มที่อยู่</a></label>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input class="aa-cart-view-btn" type="submit"
                                                            value="แก้ไขรถเข็นของฉัน">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <!-- quick view modal -->
                        @include('layouts.modal-product')
                        <!-- / quick view modal -->
                        @else
                        <div class="col-md text-center" style="margin-top: 50px;">
                            <a href="{{ url('home') }}" class="aa-browse-btn">เลือกชื้อสินค้า</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Cart view section -->
<!-- Cart view section -->
@if ($orderproduct->count())
<section id="checkout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ url('order-product-mycheckout') }}" accept-charset="UTF-8"
                    class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="checkout-area">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="checkout-left">
                                    <div class="checkout-right">
                                        <h4>สรุปยอดสั่งสินค้า : ซื้อสินค้าครบ
                                            {{ number_format($config->freeshipping,2) }} บาทบริการจัดส่งฟรี</h4>
                                        <div class="aa-order-summary-area">
                                            <table class="table table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>สินค้า</th>
                                                        <th>จำนวน</th>
                                                        <th>รวมราคา</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orderproduct as $item)
                                                    <tr>
                                                        <td>{{ $item->product->name }}</td>
                                                        <td>{{ $item->qty }}</td>
                                                        <td>{{ number_format($item->price,2) }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="2">ส่วนลด</th>
                                                        <td>
                                                            @if ($orderproduct->sum('disc') > 0)
                                                            {{ number_format($orderproduct->sum('disc'),2) . ' บาท'}}
                                                            @else
                                                            {{ 'รายการสินค้าไม่มีส่วนลดคะ' }}
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">ค่าจัดส่ง</th>
                                                        <td>
                                                            @if ($orderproduct->sum('net') < $config->freeshipping)
                                                            {{ number_format($config->shipping,2) . ' บาท'}}
                                                            @else
                                                            {{ 'จัดส่งฟรี'}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">ร่วมจ่ายสุทธิ</th>
                                                        <td>
                                                            @if ($orderproduct->sum('net') >= $config->freeshipping)
                                                            {{ number_format($orderproduct->sum('net'),2) . ' บาท'}}
                                                            @else
                                                            {{ number_format($orderproduct->sum('net') + $config->shipping,2) . ' บาท'}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="checkout-right">
                                    <h4>วิธีชำระเงิน</h4>
                                    <div class="aa-payment-method">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td scope="row">
                                                        <img src="{{ url('/') }}/storage/{{ $config->bbl_logo }}">
                                                    </td>
                                                    <td>
                                                        {{ $config->scb }}
                                                        <a href="http://" target="_blank" rel="">
                                                            <img src="{{ url('/') }}/storage/config/QR.jpg">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">
                                                        <img src="{{ url('/') }}/storage/{{ $config->kbsnk_logo }}">
                                                    </td>
                                                    <td>
                                                        {{ $config->kbsnk }}
                                                        <a href="http://" target="_blank" rel="">
                                                            <img src="{{ url('/') }}/storage/config/QR.jpg">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">
                                                        <img src="{{ url('/') }}/storage/{{ $config->scb_logo }}">
                                                    </td>
                                                    <td>
                                                        {{ $config->scb }}
                                                        <a href="http://" target="_blank" rel="">
                                                            <img src="{{ url('/') }}/storage/config/QR.jpg">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">
                                                        <img src="{{ url('/') }}/storage/{{ $config->bay_logo }}">
                                                    </td>
                                                    <td>
                                                        {{ $config->bay }}
                                                        <a href="http://" target="_blank" rel="">
                                                            <img src="{{ url('/') }}/storage/config/QR.jpg">
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        {{-- <label for="cashdelivery"><input type="radio" id="cashdelivery"
                                                name="optionsRadios"> Cash on Delivery </label>
                                        <label for="paypal"><input type="radio" id="paypal" name="optionsRadios"
                                                checked> Via Paypal </label> --}}
                                        @if ($profile)
                                        <div class="col-md">
                                            <div name="receipt" id="receipt" class="text-center receipt">
                                            </div>
                                        </div>
                                        <input type="file" id="slip" name="slip" class="aa-browse-btn form-control"
                                            required>
                                            <input type="hidden" id="shipping" name="shipping"
                                            value="{{ $orderproduct->sum('net') < $config->freeshipping ? $config->shipping : 0 }}">
                                        <input type="submit" value="สังชื้อสินค้า" class="aa-browse-btn">
                                        @else
                                        <a href="{{ url('myaccount') }}"
                                            class="aa-browse-btn">เพิ่มที่อยู่ในการจัดส่ง</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endif
<!-- / Cart view section -->

@endsection
