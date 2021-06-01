@extends('layouts.dailyshop')

@section('title','Pawarisa Shop | Checkout Detail')

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

    .checkout {
        font-size: 16px;
    }

    #aa-product-category .aa-product-catg-content .tab-content .media-body .aa-product-rating span {
        color: #ff6600;
    }
</style>
<!-- product category -->
<section id="aa-product-category">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                <div class="aa-product-catg-content">
                    <div class="aa-product-inner">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="all">
                                <div class="row">
                                    <div class="col-md-6 created_at">
                                        <a class="checkout">{{'หมายเลยคำสั่งซื้อ # ' . $order->id }}<a><br>
                                                <span>{{'สั่งเมื่อวันที่ ' . $order->created_at }}</span>
                                    </div>
                                    <div class="col-md-6 mycheckout text-right">
                                        <a href="{{ url('mycheckout') }}" type="button" class="btn btn-danger">ทั้งหมด</a>
                                    </div>
                                </div>
                                @foreach ($orderProduct as $item)
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
                                        <span>{{ $item->status }}</span>
                                    </div>
                                    <div class="col-md-2 mycheckout">
                                        <div class="media-body">
                                            <div class="aa-product-rating">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                @endforeach
                                <div class="row">
                                    <div class="col-md-8 mycheckout">
                                        <p>ที่อยู่ในการจัดส่งสินค้า</p>
                                        <span>{{ $order->address }}</span>
                                    </div>
                                    <div class="col-md-4 mycheckout">
                                        <p>สรุปยอดทั้งหมด</p>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td scope="row">ยอดรวม</td>
                                                    <td>{{'฿ '. number_format($order->price,2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">ค่าจัดส่ง</td>
                                                    <td>{{'฿ '. number_format($order->shipping,2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">ส่วนลดจากร้าน</td>
                                                    <td>{{'฿ '.number_format($order->disc,2) }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">รวมจ่ายทั้งหมด</th>
                                                    <th>{{'฿ '.number_format($order->net,2) }}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2" scope="row">
                                                        เลขพัสดุ :
                                                        {{ isset($order->tracking)? $order->tracking : $order->status}}
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                            </div>

                        </div>
                    </div>
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
