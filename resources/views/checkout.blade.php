@extends('layouts.dailyshop')

@section('title','Pawarisa Shop | Checkout')

@section('content')
<style>
    .created_at span {
        font-size: 12px;
    }

    .mycheckout span,
    a {
        font-size: 14px;
    }

    .mycheckout p {
        font-size: 16px;
    }

    .mycheckout table th,
    td {
        font-size: 14px;
    }
    .checkout{
        font-size: 16px;
    }
</style>
<!-- product category -->
<section id="aa-product-category">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                <div class="aa-product-catg-content">
                    @if (session('alert'))
                    <div class="alert alert-success">
                        {{ session('alert') }}
                    </div>
                    @endif
                    @if ($order->count())
                    <div class="aa-product-inner">
                        <!-- start prduct navigation -->
                        <ul class="nav nav-tabs aa-products-tab">
                            <li class="active"><a href="#all" data-toggle="tab">ทั้งหมด</a></li>
                            <li><a href="#paid" data-toggle="tab">รอตรวจสอบ</a></li>
                            <li><a href="#checking" data-toggle="tab">รอจัดส่ง</a></li>
                            <li><a href="#sent" data-toggle="tab">จัดส่งแล้ว</a></li>
                            <li><a href="#completed" data-toggle="tab">ได้รับสินค้าแล้ว</a></li>
                            <li><a href="#cancelled" data-toggle="tab">ยกเลิก</a></li>
                        </ul>
                        <br>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="all">
                                @foreach($order as $item_po)
                                <div class="row">
                                    <div class="col-md-6 created_at">
                                        <a class="checkout">{{'หมายเลยคำสั่งซื้อ # ' . $item_po->id }}<a><br>
                                                <span>{{'สั่งเมื่อวันที่ ' . $item_po->created_at }}</span>
                                    </div>
                                    <div class="col-md-6 mycheckout text-right">
                                        <a href="{{ url('mycheckout-detail/'.$item_po->id) }}" type="button" class="btn btn-danger" target="_blank">ดูรายการ</a>
                                    </div>
                                </div>
                                @foreach ($orderProduct as $item)
                                @if ($item_po->id == $item->po_id)
                                <div class="row">
                                    <div class="col-md-2">
                                        <a href="{{ url('product-detail?search='.$item->prod_id) }}">
                                            <img src="{{ url('/') }}/storage/{{ $item->product->photo1 }}"
                                                class="img-rounded center-block" alt="img" width="80px" height="80px">
                                        </a>
                                    </div>
                                    <div class="col-md-4 mycheckout">
                                        <a class="aa-cart-title" href="javascript:void(0)">
                                            {{ $item->product->name }}
                                        </a>
                                    </div>
                                    <div class="col-md-2 mycheckout">
                                        <span>{{'฿ '. number_format($item->product->price,2) }}</span>
                                    </div>
                                    <div class="col-md-2 mycheckout">
                                        <span> {{'Qty : ' .$item->qty }}</span>
                                    </div>
                                    <div class="col-md-2 mycheckout">
                                        <span>{{ $item_po->status }}</span>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                <hr>
                                @endforeach
                            </div>

                            <div class="tab-pane fade in" id="paid">
                                @if ($paid->count())
                                    @foreach($paid as $item_po)
                                    <div class="row">
                                        <div class="col-md-6 created_at">
                                            <a class="checkout">{{'หมายเลยคำสั่งซื้อ # ' . $item_po->id }}<a><br>
                                                    <span>{{'สั่งเมื่อวันที่ ' . $item_po->created_at }}</span>
                                        </div>
                                        <div class="col-md-6 mycheckout text-right">
                                            <a href="{{ url('mycheckout-detail/'.$item_po->id) }}" type="button" class="btn btn-danger" target="_blank">ดูรายการ</a>
                                        </div>
                                    </div>
                                        @foreach ($orderProduct as $item)
                                            @if ($item_po->id == $item->po_id)
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{ url('product-detail?search='.$item->prod_id) }}">
                                                        <img src="{{ url('/') }}/storage/{{ $item->product->photo1 }}"
                                                            class="img-rounded center-block" alt="img" width="80px" height="80px">
                                                    </a>
                                                </div>
                                                <div class="col-md-4 mycheckout">
                                                    <a class="aa-cart-title" href="javascript:void(0)">
                                                        {{ $item->product->name }}
                                                    </a>
                                                </div>
                                                <div class="col-md-2 mycheckout">
                                                    <span>{{'฿ '. number_format($item->product->price,2) }}</span>
                                                </div>
                                                <div class="col-md-2 mycheckout">
                                                    <span> {{'Qty : ' .$item->qty }}</span>
                                                </div>
                                                <div class="col-md-2 mycheckout">
                                                    <span>{{ $item_po->status }}</span>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                        <hr>
                                    @endforeach
                                @else
                                <div class="row">
                                    <div class="col-md created_at text-center">
                                        <a class="checkout">ไม่มีรายการรอตรวจสอบคะ<a><br>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="tab-pane fade in" id="checking">
                                @if ($checking->count())
                                    @foreach($checking as $item_po)
                                    <div class="row">
                                        <div class="col-md-6 created_at">
                                            <a class="checkout">{{'หมายเลยคำสั่งซื้อ # ' . $item_po->id }}<a><br>
                                                    <span>{{'สั่งเมื่อวันที่ ' . $item_po->created_at }}</span>
                                        </div>
                                        <div class="col-md-6 mycheckout text-right">
                                            <a href="{{ url('mycheckout-detail/'.$item_po->id) }}" type="button" class="btn btn-danger" target="_blank">ดูรายการ</a>
                                        </div>
                                    </div>
                                        @foreach ($orderProduct as $item)
                                            @if ($item_po->id == $item->po_id)
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{ url('product-detail?search='.$item->prod_id) }}">
                                                        <img src="{{ url('/') }}/storage/{{ $item->product->photo1 }}"
                                                            class="img-rounded center-block" alt="img" width="80px" height="80px">
                                                    </a>
                                                </div>
                                                <div class="col-md-4 mycheckout">
                                                    <a class="aa-cart-title" href="javascript:void(0)">
                                                        {{ $item->product->name }}
                                                    </a>
                                                </div>
                                                <div class="col-md-2 mycheckout">
                                                    <span>{{'฿ '. number_format($item->product->price,2) }}</span>
                                                </div>
                                                <div class="col-md-2 mycheckout">
                                                    <span> {{'Qty : ' .$item->qty }}</span>
                                                </div>
                                                <div class="col-md-2 mycheckout">
                                                    <span>{{ $item_po->status }}</span>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                        <hr>
                                    @endforeach
                                @else
                                <div class="row">
                                    <div class="col-md created_at text-center">
                                        <a class="checkout">ไม่มีรายการรอจัดส่งคะ<a><br>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="tab-pane fade in" id="sent">
                                @if ($sent->count())
                                    @foreach($sent as $item_po)
                                    <div class="row">
                                        <div class="col-md-6 created_at">
                                            <a class="checkout">{{'หมายเลยคำสั่งซื้อ # ' . $item_po->id }}<a><br>
                                                    <span>{{'สั่งเมื่อวันที่ ' . $item_po->created_at }}</span>
                                        </div>
                                        <div class="col-md-6 mycheckout text-right">
                                            <a href="{{ url('mycheckout-detail/'.$item_po->id) }}" type="button" class="btn btn-danger" target="_blank">ดูรายการ</a>
                                        </div>
                                    </div>
                                        @foreach ($orderProduct as $item)
                                            @if ($item_po->id == $item->po_id)
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{ url('product-detail?search='.$item->prod_id) }}">
                                                        <img src="{{ url('/') }}/storage/{{ $item->product->photo1 }}"
                                                            class="img-rounded center-block" alt="img" width="80px" height="80px">
                                                    </a>
                                                </div>
                                                <div class="col-md-4 mycheckout">
                                                    <a class="aa-cart-title" href="javascript:void(0)">
                                                        {{ $item->product->name }}
                                                    </a>
                                                </div>
                                                <div class="col-md-2 mycheckout">
                                                    <span>{{'฿ '. number_format($item->product->price,2) }}</span>
                                                </div>
                                                <div class="col-md-2 mycheckout">
                                                    <span> {{'Qty : ' .$item->qty }}</span>
                                                </div>
                                                <div class="col-md-2 mycheckout">
                                                    <span>{{ $item_po->status }}</span>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                        <hr>
                                    @endforeach
                                @else
                                <div class="row">
                                    <div class="col-md created_at text-center">
                                        <a class="checkout">ไม่มีรายการจัดส่งแล้วคะ<a><br>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="tab-pane fade in" id="completed">
                                @if ($completed->count())
                                    @foreach($completed as $item_po)
                                    <div class="row">
                                        <div class="col-md-6 created_at">
                                            <a class="checkout">{{'หมายเลยคำสั่งซื้อ # ' . $item_po->id }}<a><br>
                                                    <span>{{'สั่งเมื่อวันที่ ' . $item_po->created_at }}</span>
                                        </div>
                                        <div class="col-md-6 mycheckout text-right">
                                            <a href="{{ url('mycheckout-detail/'.$item_po->id) }}" type="button" class="btn btn-danger" target="_blank">ดูรายการ</a>
                                        </div>
                                    </div>
                                        @foreach ($orderProduct as $item)
                                            @if ($item_po->id == $item->po_id)
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{ url('product-detail?search='.$item->prod_id) }}">
                                                        <img src="{{ url('/') }}/storage/{{ $item->product->photo1 }}"
                                                            class="img-rounded center-block" alt="img" width="80px" height="80px">
                                                    </a>
                                                </div>
                                                <div class="col-md-4 mycheckout">
                                                    <a class="aa-cart-title" href="javascript:void(0)">
                                                        {{ $item->product->name }}
                                                    </a>
                                                </div>
                                                <div class="col-md-2 mycheckout">
                                                    <span>{{'฿ '. number_format($item->product->price,2) }}</span>
                                                </div>
                                                <div class="col-md-2 mycheckout">
                                                    <span> {{'Qty : ' .$item->qty }}</span>
                                                </div>
                                                <div class="col-md-2 mycheckout">
                                                    <span>{{ $item_po->status }}</span>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                        <hr>
                                    @endforeach
                                @else
                                <div class="row">
                                    <div class="col-md created_at text-center">
                                        <a class="checkout">ไม่มีรายการได้รับสินค้าแล้วคะ<a><br>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="tab-pane fade in" id="cancelled">
                                @if ($cancelled->count())
                                    @foreach($cancelled as $item_po)
                                    <div class="row">
                                        <div class="col-md-6 created_at">
                                            <a class="checkout">{{'หมายเลยคำสั่งซื้อ # ' . $item_po->id }}<a><br>
                                                    <span>{{'สั่งเมื่อวันที่ ' . $item_po->created_at }}</span>
                                        </div>
                                        <div class="col-md-6 mycheckout text-right">
                                            <a href="{{ url('mycheckout-detail/'.$item_po->id) }}" type="button" class="btn btn-danger" target="_blank">ดูรายการ</a>
                                        </div>
                                    </div>
                                        @foreach ($orderProduct as $item)
                                            @if ($item_po->id == $item->po_id)
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{ url('product-detail?search='.$item->prod_id) }}">
                                                        <img src="{{ url('/') }}/storage/{{ $item->product->photo1 }}"
                                                            class="img-rounded center-block" alt="img" width="80px" height="80px">
                                                    </a>
                                                </div>
                                                <div class="col-md-4 mycheckout">
                                                    <a class="aa-cart-title" href="javascript:void(0)">
                                                        {{ $item->product->name }}
                                                    </a>
                                                </div>
                                                <div class="col-md-2 mycheckout">
                                                    <span>{{'฿ '. number_format($item->product->price,2) }}</span>
                                                </div>
                                                <div class="col-md-2 mycheckout">
                                                    <span> {{'Qty : ' .$item->qty }}</span>
                                                </div>
                                                <div class="col-md-2 mycheckout">
                                                    <span>{{ $item_po->status }}</span>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                        <hr>
                                    @endforeach
                                @else
                                <div class="row">
                                    <div class="col-md created_at text-center">
                                        <a class="checkout">ไม่มีรายการที่ยกเลิกคะ<a><br>
                                    </div>
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    @else
                    <div class="col-md text-center" style="margin-top: 50px;">
                        <a href="{{ url('home') }}" class="aa-browse-btn">เลือกชื้อสินค้า</a>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                <aside class="aa-sidebar">
                    <!-- single sidebar -->
                    {{-- <div class="aa-sidebar-widget">
                        <h3>รายการสินค้า</h3>
                        <ul class="aa-catg-nav">
                            @foreach (App\Category::get() as $cat)
                            <li><a href="{{ url('products?category='.$cat->id) }}">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </div> --}}
                    <div class="aa-sidebar-widget">
                        <h3></h3>
                        <ul class="aa-catg-nav">
                            <li><a href="{{ url('myaccount') }}"><i class="far fa-user-circle"></i> บัญชีของฉัน</a></li>
                            <li><a href="{{ url('mywishlist') }}"><i class="far fa-heart"></i></i> สิ่งที่ฉันอยากได้</a></li>
                            <li><a href="{{ url('mycart') }}"><i class="fas fa-cart-arrow-down"></i> รถเข็นของฉัน</a></li>
                            <li><a href="{{ url('mycheckout') }}"><i class="far fa-bookmark"></i> คำสั่งชื่อของฉัน</a></li>
                        </ul>
                    </div>

                </aside>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>

</section>
<!-- / product category -->

@endsection
