@extends('layouts.dailyshop')

@section('title','Pawarisa Shop | Wishlist')

@section('content')

<!-- Cart view section -->
<section id="cart-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cart-view-area">
                    <div class="cart-view-table aa-wishlist-table">
                        @if ($wishlist->count())
                        <form action="">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>สินค้า</th>
                                            <th>ราคา</th>
                                            <th>จำนวนที่มี</th>
                                            <th>รูปสินค้า</th>
                                            <th>เพิ่มไปยังรถเข็น</th>
                                            <th>ยกเลิก</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wishlist as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a class="aa-cart-title" href="javascript:void(0)">{{ $item->product->name }}</a>
                                            </td>
                                            <td>
                                                {{ number_format($item->product->price - $item->product->disc,2) }}
                                            </td>
                                            <td>
                                                {{ $item->product->qty }}
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)">
                                                    <img src="{{ url('/') }}/storage/{{ $item->product->photo1 }}" alt="img">
                                                </a>
                                            </td>
                                            <td>
                                                <a class="aa-add-to-cart-btn add-to-mycart" data-prod_id="{{ $item->prod_id }}"
                                                    data-user_id="{{ Auth::id() ? Auth::id() : ''}}" href="javascript:void(0)">
                                                    <span class="fa fa-shopping-cart" style="font-size: 24px;"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="remove" href="{{ url('mywishlist-delete/'. $item->id) }}" >
                                                    <i class="far fa-times-circle" style="font-size: 24px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>
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

@endsection
