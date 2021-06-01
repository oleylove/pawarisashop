@extends('layouts.dailyshop')

@section('title','Pawarisa Shop | Welcome')

@section('content')
<!-- Start Promo section -->
{{-- <section id="aa-promo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-promo-area">
                    <div class="row">
                        <!-- promo left -->
                        <div class="col-md-5 no-padding">
                            <div class="aa-promo-left">
                                <div class="aa-promo-banner">
                                    <img src="{{ url('/') }}/storage/{{ $config->photo1 }}" alt="img">
<div class="aa-prom-content">
    <span>75% Off</span>
    <h4><a href="javascript:void(0)">For Women</a></h4>
</div>
</div>
</div>
</div>
<!-- promo right -->
<div class="col-md-7 no-padding">
    <div class="aa-promo-right">
        <div class="aa-single-promo-right">
            <div class="aa-promo-banner">
                <img src="{{ url('/') }}/storage/{{ $config->photo2 }}" alt="img">
                <div class="aa-prom-content">
                    <span>Exclusive Item</span>
                    <h4><a href="javascript:void(0)">For Men</a></h4>
                </div>
            </div>
        </div>
        <div class="aa-single-promo-right">
            <div class="aa-promo-banner">
                <img src="{{ url('/') }}/storage/{{ $config->photo3 }}" alt="img">
                <div class="aa-prom-content">
                    <span>Sale Off</span>
                    <h4><a href="javascript:void(0)">On Shoes</a></h4>
                </div>
            </div>
        </div>
        <div class="aa-single-promo-right">
            <div class="aa-promo-banner">
                <img src="{{ url('/') }}/storage/{{ $config->photo4 }}" alt="img">
                <div class="aa-prom-content">
                    <span>New Arrivals</span>
                    <h4><a href="javascript:void(0)">For Kids</a></h4>
                </div>
            </div>
        </div>
        <div class="aa-single-promo-right">
            <div class="aa-promo-banner">
                <img src="{{ url('/') }}/storage/{{ $config->photo5 }}" alt="img">
                <div class="aa-prom-content">
                    <span>25% Off</span>
                    <h4><a href="javascript:void(0)">For Bags</a></h4>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section> --}}
<!-- / Promo section -->

<!-- Products section -->
<section id="aa-product">
    <div class="container" style="margin-top: 10px">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-product-area">
                        <div class="aa-product-inner">
                            <!-- start prduct navigation -->
                            {{-- <ul class="nav nav-tabs aa-products-tab">
                                <li class="active"><a href="#men" data-toggle="tab">สินค้าผู้ชาย</a></li>
                                <li><a href="#women" data-toggle="tab">สินค้าผู้หญิง</a></li>
                                <li><a href="#sports" data-toggle="tab">สินค้ามือสองผู้ชาย</a></li>
                                <li><a href="#electronics" data-toggle="tab">สินค้ามือสองผู้หญิง</a></li>
                            </ul> --}}
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- Start men product category -->
                                <div class="tab-pane fade in active" id="men">
                                    <ul class="aa-product-catg">
                                        <!-- start single product item -->
                                        @foreach ($products as $item)
                                        <li>
                                            <figure>
                                                <a class="aa-product-img" target="_blank"
                                                    href="{{ url('product-detail?search='.$item->id) }}">
                                                    @if (Storage::exists('public/'.$item->photo1))
                                                    <img src="{{ url('/') }}/storage/{{ $item->photo1 }}" width="250px"
                                                        height="300px">
                                                    @else
                                                        @if (Storage::exists('public/'.$item->photo2))
                                                        <img src="{{ url('/') }}/storage/{{ $item->photo2 }}" width="250px"
                                                            height="300px">
                                                        @else
                                                            @if (Storage::exists('public/'.$item->photo3))
                                                            <img src="{{ url('/') }}/storage/{{ $item->photo3 }}" width="250px"
                                                                height="300px">
                                                            @else
                                                            <img src="{{ url('/') }}/storage/products/404.jpg" width="250px"
                                                            height="300px">
                                                            @endif
                                                        @endif
                                                    @endif
                                                </a>
                                                @if ($item->qty > 0)
                                                <a class="aa-add-card-btn add-to-mycart" data-prod_id="{{ $item->id }}"
                                                    data-user_id="{{ Auth::id() ? Auth::id() : ''}}" href="javascript:void(0)">
                                                    <span class="fa fa-shopping-cart"></span>
                                                    เพิ่มไปยังรถเข็น
                                                </a>
                                                @else
                                                <a class="aa-add-card-btn" href="javascript:void(0)"
                                                    onclick="return alert(&quot;สินค้าหมดคะ!&quot;)">
                                                    <span class="far fa-times-circle"></span>
                                                    Pre order
                                                </a>
                                                @endif
                                                <figcaption>
                                                    <h4 class="aa-product-title">
                                                        <a href="{{ url('product-detail?search='.$item->id) }}"
                                                            target="_blank">{{ $item->name }}
                                                        </a>
                                                    </h4>
                                                    <span
                                                        class="aa-product-price">฿{{ number_format($item->price - $item->disc,2) }}</span>
                                                    @if ($item->disc > 0)
                                                    <span class="aa-product-price">
                                                        <del>฿{{ number_format($item->price,2) }}</del>
                                                    </span>
                                                    @endif
                                                </figcaption>
                                            </figure>
                                            <div class="aa-product-hvr-content">
                                                <a class="add-to-wishlist" data-prod_id="{{ $item->id }}"
                                                    href="javascript:void(0)"
                                                    data-user_id="{{ Auth::id() ? Auth::id() : ''}}"
                                                    data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                    <span class="far fa-heart"></span>
                                                </a>
                                                <a class="add-to-likes" data-id="{{ $item->id }}"
                                                    href="javascript:void(0)"
                                                    data-user_id="{{ Auth::id() ? Auth::id() : ''}}"
                                                    data-toggle="tooltip" data-placement="top" title="Like">
                                                    <span class="far fa-thumbs-up"></span>
                                                </a>
                                                <a href="javascript:void(0)" data-toggle2="tooltip" data-placement="top"
                                                    title="Quick View" data-toggle="modal" data-id="{{ $item->id }}"
                                                    id="ShowModelProduct">
                                                    <span class="fas fa-search"></span>
                                                </a>
                                            </div>
                                            <!-- product badge -->
                                            @if ($item->hot == 1 && $item->disc == 0 && $item->qty > 0)
                                            <span class="aa-badge aa-hot">HOT!</span>
                                            @elseif($item->hot == 0 && $item->disc > 0 && $item->qty > 0)
                                            <span class="aa-badge aa-sale">SALE!</span>
                                            @elseif($item->hot == 0 && $item->disc == 0 && $item->qty == 0)
                                            <span class="aa-badge aa-sold-out">Sold Out!</span>
                                            @elseif($item->hot == 1 && $item->disc > 0 && $item->qty > 0)
                                            <span class="aa-badge aa-hot">HOT!</span>
                                            <span class="aa-badge aa-sale" style="margin-top: 35px">SALE!</span>
                                            @elseif($item->hot == 1 && $item->disc == 0 && $item->qty == 0)
                                            <span class="aa-badge aa-hot">HOT!</span>
                                            <span class="aa-badge aa-sold-out" style="margin-top: 35px">Sold Out!</span>
                                            @elseif($item->hot == 0 && $item->disc > 0 && $item->qty == 0)
                                            <span class="aa-badge aa-sale">SALE!</span>
                                            <span class="aa-badge aa-sold-out" style="margin-top: 35px">Sold Out!</span>
                                            @elseif($item->hot == 1 && $item->disc > 0 && $item->qty == 0)
                                            <span class="aa-badge aa-sale">SALE!</span>
                                            <span class="aa-badge aa-hot" style="margin-top: 35px">HOT!</span>
                                            <span class="aa-badge aa-sold-out" style="margin-top: 70px">Sold Out!</span>
                                            @endif
                                        </li>
                                        @endforeach
                                        <!-- start single product item -->
                                    </ul>
                                    @if ($products->count())
                                    <a class="aa-browse-btn" href={{ url('products') }}>
                                        Browse all Product
                                        <span class="fas fa-arrow-right"></span>
                                    </a>
                                    @else
                                    <a class="aa-browse-btn" href=javascript:void(0)>
                                        ยังไม่มีสินค้าคะ
                                    </a>
                                    @endif
                                </div>
                                <!-- / men product category -->

                                <!-- start women product category -->
                                {{-- <div class="tab-pane fade" id="women">
                                    <ul class="aa-product-catg">
                                        <!-- start single product item -->
                                        @foreach ($prod_cat2 as $item)
                                        <li>
                                            <figure>
                                                <a class="aa-product-img" target="_blank"
                                                    href="{{ url('product-detail?search='.$item->id) }}">
                                <img src="{{ url('/') }}/storage/{{ $item->photo1 }}">
                                </a>
                                @if ($item->qty > 0)
                                <a class="aa-add-card-btn add-to-mycart" data-prod_id="{{ $item->id }}"
                                    data-user_id="{{ Auth::id() ? Auth::id() : ''}}" href="javascript:void(0)">
                                    <span class="fa fa-shopping-cart"></span>
                                    เพิ่มไปยังรถเข็น
                                </a>
                                @else
                                <a class="aa-add-card-btn" href="javascript:void(0)"
                                    onclick="return alert(&quot;สินค้าหมดคะ!&quot;)">
                                    <span class="far fa-times-circle"></span>
                                    Pre order
                                </a>
                                @endif
                                <figcaption>
                                    <h4 class="aa-product-title">
                                        <a href="{{ url('product-detail?search='.$item->id) }}"
                                            target="_blank">{{ $item->name }}
                                        </a>
                                    </h4>
                                    <span
                                        class="aa-product-price">฿{{ number_format($item->price - $item->disc,2) }}</span>
                                    @if ($item->disc > 0)
                                    <span class="aa-product-price">
                                        <del>฿{{ number_format($item->price,2) }}</del>
                                    </span>
                                    @endif
                                </figcaption>
                                </figure>
                                <div class="aa-product-hvr-content">
                                    <a class="add-to-wishlist" data-prod_id="{{ $item->id }}" href="javascript:void(0)"
                                        data-user_id="{{ Auth::id() ? Auth::id() : ''}}" data-toggle="tooltip"
                                        data-placement="top" title="Add to Wishlist">
                                        <span class="far fa-heart"></span>
                                    </a>
                                    <a class="add-to-likes" data-id="{{ $item->id }}" href="javascript:void(0)"
                                        data-user_id="{{ Auth::id() ? Auth::id() : ''}}" data-toggle="tooltip"
                                        data-placement="top" title="Like">
                                        <span class="far fa-thumbs-up"></span>
                                    </a>
                                    <a href="javascript:void(0)" data-toggle2="tooltip" data-placement="top"
                                        title="Quick View" data-toggle="modal" data-id="{{ $item->id }}"
                                        id="ShowModelProduct">
                                        <span class="fas fa-search"></span>
                                    </a>
                                </div>
                                <!-- product badge -->
                                @if ($item->hot == 1 && $item->disc == 0 && $item->qty > 0)
                                <span class="aa-badge aa-hot">HOT!</span>
                                @elseif($item->hot == 0 && $item->disc > 0 && $item->qty > 0)
                                <span class="aa-badge aa-sale">SALE!</span>
                                @elseif($item->hot == 0 && $item->disc == 0 && $item->qty == 0)
                                <span class="aa-badge aa-sold-out">Sold Out!</span>
                                @elseif($item->hot == 1 && $item->disc > 0 && $item->qty > 0)
                                <span class="aa-badge aa-hot">HOT!</span>
                                <span class="aa-badge aa-sale" style="margin-top: 35px">SALE!</span>
                                @elseif($item->hot == 1 && $item->disc == 0 && $item->qty == 0)
                                <span class="aa-badge aa-hot">HOT!</span>
                                <span class="aa-badge aa-sold-out" style="margin-top: 35px">Sold Out!</span>
                                @elseif($item->hot == 0 && $item->disc > 0 && $item->qty == 0)
                                <span class="aa-badge aa-sale">SALE!</span>
                                <span class="aa-badge aa-sold-out" style="margin-top: 35px">Sold Out!</span>
                                @elseif($item->hot == 1 && $item->disc > 0 && $item->qty == 0)
                                <span class="aa-badge aa-sale">SALE!</span>
                                <span class="aa-badge aa-hot" style="margin-top: 35px">HOT!</span>
                                <span class="aa-badge aa-sold-out" style="margin-top: 70px">Sold Out!</span>
                                @endif
                                </li>
                                @endforeach
                                <!-- start single product item -->
                                </ul>
                                <a class="aa-browse-btn" href={{ url('products?category=2') }}>
                                    Browse all Product <span class="fas fa-arrow-right"></span></a>
                            </div> --}}
                            <!-- / women product category -->

                            <!-- start kids product category -->
                            {{-- <div class="tab-pane fade" id="sports">
                                    <ul class="aa-product-catg">
                                        <!-- start single product item -->
                                        @foreach ($prod_cat3 as $item)
                                        <li>
                                            <figure>
                                                <a class="aa-product-img" target="_blank"
                                                    href="{{ url('product-detail?search='.$item->id) }}">
                            <img src="{{ url('/') }}/storage/{{ $item->photo1 }}">
                            </a>
                            @if ($item->qty > 0)
                            <a class="aa-add-card-btn add-to-mycart" data-prod_id="{{ $item->id }}"
                                data-user_id="{{ Auth::id() ? Auth::id() : ''}}" href="javascript:void(0)">
                                <span class="fa fa-shopping-cart"></span>
                                เพิ่มไปยังรถเข็น
                            </a>
                            @else
                            <a class="aa-add-card-btn" href="javascript:void(0)"
                                onclick="return alert(&quot;สินค้าหมดคะ!&quot;)">
                                <span class="far fa-times-circle"></span>
                                Pre order
                            </a>
                            @endif
                            <figcaption>
                                <h4 class="aa-product-title">
                                    <a href="{{ url('product-detail?search='.$item->id) }}"
                                        target="_blank">{{ $item->name }}
                                    </a>
                                </h4>
                                <span class="aa-product-price">฿{{ number_format($item->price - $item->disc,2) }}</span>
                                @if ($item->disc > 0)
                                <span class="aa-product-price">
                                    <del>฿{{ number_format($item->price,2) }}</del>
                                </span>
                                @endif
                            </figcaption>
                            </figure>
                            <div class="aa-product-hvr-content">
                                <a class="add-to-wishlist" data-prod_id="{{ $item->id }}" href="javascript:void(0)"
                                    data-user_id="{{ Auth::id() ? Auth::id() : ''}}" data-toggle="tooltip"
                                    data-placement="top" title="Add to Wishlist">
                                    <span class="far fa-heart"></span>
                                </a>
                                <a class="add-to-likes" data-id="{{ $item->id }}" href="javascript:void(0)"
                                    data-user_id="{{ Auth::id() ? Auth::id() : ''}}" data-toggle="tooltip"
                                    data-placement="top" title="Like">
                                    <span class="far fa-thumbs-up"></span>
                                </a>
                                <a href="javascript:void(0)" data-toggle2="tooltip" data-placement="top"
                                    title="Quick View" data-toggle="modal" data-id="{{ $item->id }}"
                                    id="ShowModelProduct">
                                    <span class="fas fa-search"></span>
                                </a>
                            </div>
                            <!-- product badge -->
                            @if ($item->hot == 1 && $item->disc == 0 && $item->qty > 0)
                            <span class="aa-badge aa-hot">HOT!</span>
                            @elseif($item->hot == 0 && $item->disc > 0 && $item->qty > 0)
                            <span class="aa-badge aa-sale">SALE!</span>
                            @elseif($item->hot == 0 && $item->disc == 0 && $item->qty == 0)
                            <span class="aa-badge aa-sold-out">Sold Out!</span>
                            @elseif($item->hot == 1 && $item->disc > 0 && $item->qty > 0)
                            <span class="aa-badge aa-hot">HOT!</span>
                            <span class="aa-badge aa-sale" style="margin-top: 35px">SALE!</span>
                            @elseif($item->hot == 1 && $item->disc == 0 && $item->qty == 0)
                            <span class="aa-badge aa-hot">HOT!</span>
                            <span class="aa-badge aa-sold-out" style="margin-top: 35px">Sold Out!</span>
                            @elseif($item->hot == 0 && $item->disc > 0 && $item->qty == 0)
                            <span class="aa-badge aa-sale">SALE!</span>
                            <span class="aa-badge aa-sold-out" style="margin-top: 35px">Sold Out!</span>
                            @elseif($item->hot == 1 && $item->disc > 0 && $item->qty == 0)
                            <span class="aa-badge aa-sale">SALE!</span>
                            <span class="aa-badge aa-hot" style="margin-top: 35px">HOT!</span>
                            <span class="aa-badge aa-sold-out" style="margin-top: 70px">Sold Out!</span>
                            @endif
                            </li>
                            @endforeach
                            <!-- start single product item -->
                            </ul>
                            <a class="aa-browse-btn" href={{ url('products?category=3') }}>
                                Browse all Product <span class="fas fa-arrow-right"></span></a>
                        </div> --}}
                        <!-- / kids product category -->

                        <!-- start other product category -->
                        {{-- <div class="tab-pane fade" id="electronics">
                                    <ul class="aa-product-catg">
                                        <!-- start single product item -->
                                        @foreach ($prod_cat4 as $item)
                                        <li>
                                            <figure>
                                                <a class="aa-product-img" target="_blank"
                                                    href="{{ url('product-detail?search='.$item->id) }}">
                        <img src="{{ url('/') }}/storage/{{ $item->photo1 }}">
                        </a>
                        @if ($item->qty > 0)
                        <a class="aa-add-card-btn add-to-mycart" data-prod_id="{{ $item->id }}"
                            data-user_id="{{ Auth::id() ? Auth::id() : ''}}" href="javascript:void(0)">
                            <span class="fa fa-shopping-cart"></span>
                            เพิ่มไปยังรถเข็น
                        </a>
                        @else
                        <a class="aa-add-card-btn" href="javascript:void(0)"
                            onclick="return alert(&quot;สินค้าหมดคะ!&quot;)">
                            <span class="far fa-times-circle"></span>
                            Pre order
                        </a>
                        @endif
                        <figcaption>
                            <h4 class="aa-product-title">
                                <a href="{{ url('product-detail?search='.$item->id) }}"
                                    target="_blank">{{ $item->name }}
                                </a>
                            </h4>
                            <span class="aa-product-price">฿{{ number_format($item->price - $item->disc,2) }}</span>
                            @if ($item->disc > 0)
                            <span class="aa-product-price">
                                <del>฿{{ number_format($item->price,2) }}</del>
                            </span>
                            @endif
                        </figcaption>
                        </figure>
                        <div class="aa-product-hvr-content">
                            <a class="add-to-wishlist" data-prod_id="{{ $item->id }}" href="javascript:void(0)"
                                data-user_id="{{ Auth::id() ? Auth::id() : ''}}" data-toggle="tooltip"
                                data-placement="top" title="Add to Wishlist">
                                <span class="far fa-heart"></span>
                            </a>
                            <a class="add-to-likes" data-id="{{ $item->id }}" href="javascript:void(0)"
                                data-user_id="{{ Auth::id() ? Auth::id() : ''}}" data-toggle="tooltip"
                                data-placement="top" title="Like">
                                <span class="far fa-thumbs-up"></span>
                            </a>
                            <a href="javascript:void(0)" data-toggle2="tooltip" data-placement="top" title="Quick View"
                                data-toggle="modal" data-id="{{ $item->id }}" id="ShowModelProduct">
                                <span class="fas fa-search"></span>
                            </a>
                        </div>
                        <!-- product badge -->
                        @if ($item->hot == 1 && $item->disc == 0 && $item->qty > 0)
                        <span class="aa-badge aa-hot">HOT!</span>
                        @elseif($item->hot == 0 && $item->disc > 0 && $item->qty > 0)
                        <span class="aa-badge aa-sale">SALE!</span>
                        @elseif($item->hot == 0 && $item->disc == 0 && $item->qty == 0)
                        <span class="aa-badge aa-sold-out">Sold Out!</span>
                        @elseif($item->hot == 1 && $item->disc > 0 && $item->qty > 0)
                        <span class="aa-badge aa-hot">HOT!</span>
                        <span class="aa-badge aa-sale" style="margin-top: 35px">SALE!</span>
                        @elseif($item->hot == 1 && $item->disc == 0 && $item->qty == 0)
                        <span class="aa-badge aa-hot">HOT!</span>
                        <span class="aa-badge aa-sold-out" style="margin-top: 35px">Sold Out!</span>
                        @elseif($item->hot == 0 && $item->disc > 0 && $item->qty == 0)
                        <span class="aa-badge aa-sale">SALE!</span>
                        <span class="aa-badge aa-sold-out" style="margin-top: 35px">Sold Out!</span>
                        @elseif($item->hot == 1 && $item->disc > 0 && $item->qty == 0)
                        <span class="aa-badge aa-sale">SALE!</span>
                        <span class="aa-badge aa-hot" style="margin-top: 35px">HOT!</span>
                        <span class="aa-badge aa-sold-out" style="margin-top: 70px">Sold Out!</span>
                        @endif
                        </li>
                        @endforeach
                        <!-- start single product item -->
                        </ul>
                        <a class="aa-browse-btn" href={{ url('products?category=4') }}>
                            Browse all Product <span class="fas fa-arrow-right"></span></a>
                    </div> --}}
                    <!-- / other product category -->

                </div>

                <!-- quick view modal -->
                @if ($products->count())
                @include('layouts.modal-product')
                @endif
                <!-- / quick view modal -->

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</section>
<!-- / Products section -->

<!-- banner section -->
{{-- <section id="aa-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-banner-area">
                        <a href="javascript:void(0)"><img src="{{ url('/') }}/storage/img/fashion-banner.jpg"
                                alt="fashion banner img"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- /banner section -->

<!-- popular section -->
<section id="aa-popular-category">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-popular-category-area">
                        <!-- start prduct navigation -->
                        <ul class="nav nav-tabs aa-products-tab">
                            <li class="active"><a href="#popular" data-toggle="tab">สินค้าขายดี</a></li>
                            <li><a href="#featured" data-toggle="tab">สินค้านิยม</a></li>
                            <li><a href="#latest" data-toggle="tab">สินค้ามาใหม่</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- Start men popular category -->
                            <div class="tab-pane fade in active" id="popular">
                                <ul class="aa-product-catg aa-popular-slider">
                                    <!-- start single product item -->
                                    @foreach ($popular as $item)
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" target="_blank"
                                                href="{{ url('product-detail?search='.$item->id) }}">
                                                @if (Storage::exists('public/'.$item->photo1))
                                                <img src="{{ url('/') }}/storage/{{ $item->photo1 }}" width="250px"
                                                    height="300px">
                                                @else
                                                    @if (Storage::exists('public/'.$item->photo2))
                                                    <img src="{{ url('/') }}/storage/{{ $item->photo2 }}" width="250px"
                                                        height="300px">
                                                    @else
                                                        @if (Storage::exists('public/'.$item->photo3))
                                                        <img src="{{ url('/') }}/storage/{{ $item->photo3 }}" width="250px"
                                                            height="300px">
                                                        @else
                                                        <img src="{{ url('/') }}/storage/products/404.jpg" width="250px"
                                                        height="300px">
                                                        @endif
                                                    @endif
                                                @endif
                                            </a>
                                            @if ($item->qty > 0)
                                            <a class="aa-add-card-btn add-to-mycart" data-prod_id="{{ $item->id }}"
                                                data-user_id="{{ Auth::id() ? Auth::id() : ''}}"
                                                href="javascript:void(0)">
                                                <span class="fa fa-shopping-cart"></span>
                                                เพิ่มไปยังรถเข็น
                                            </a>
                                            @else
                                            <a class="aa-add-card-btn" href="javascript:void(0)"
                                                onclick="return alert(&quot;สินค้าหมดคะ!&quot;)">
                                                <span class="far fa-times-circle"></span>
                                                Pre order
                                            </a>
                                            @endif
                                            <figcaption>
                                                <h4 class="aa-product-title">
                                                    <a href="{{ url('product-detail?search='.$item->id) }}"
                                                        target="_blank">
                                                        {{ $item->name }}
                                                    </a>
                                                </h4>
                                                <span
                                                    class="aa-product-price">฿{{ number_format($item->price - $item->disc,2) }}</span>
                                                @if ($item->disc > 0)
                                                <span class="aa-product-price">
                                                    <del>฿{{ number_format($item->price,2) }}</del>
                                                </span>
                                                @endif
                                            </figcaption>
                                        </figure>
                                        <div class="aa-product-hvr-content">
                                            <a class="add-to-wishlist" data-prod_id="{{ $item->id }}"
                                                href="javascript:void(0)"
                                                data-user_id="{{ Auth::id() ? Auth::id() : ''}}" data-toggle="tooltip"
                                                data-placement="top" title="Add to Wishlist">
                                                <span class="far fa-heart"></span>
                                            </a>
                                            <a class="add-to-likes" data-id="{{ $item->id }}" href="javascript:void(0)"
                                                data-user_id="{{ Auth::id() ? Auth::id() : ''}}" data-toggle="tooltip"
                                                data-placement="top" title="Like">
                                                <span class="far fa-thumbs-up"></span>
                                            </a>
                                            <a href="javascript:void(0)" data-toggle2="tooltip" data-placement="top"
                                                title="Quick View" data-toggle="modal" data-id="{{ $item->id }}"
                                                id="ShowModelProduct">
                                                <span class="fas fa-search"></span>
                                            </a>
                                        </div>
                                        <!-- product badge -->
                                        @if ($item->hot == 1 && $item->disc == 0 && $item->qty > 0)
                                        <span class="aa-badge aa-hot">HOT!</span>
                                        @elseif($item->hot == 0 && $item->disc > 0 && $item->qty > 0)
                                        <span class="aa-badge aa-sale">SALE!</span>
                                        @elseif($item->hot == 0 && $item->disc == 0 && $item->qty == 0)
                                        <span class="aa-badge aa-sold-out">Sold Out!</span>
                                        @elseif($item->hot == 1 && $item->disc > 0 && $item->qty > 0)
                                        <span class="aa-badge aa-hot">HOT!</span>
                                        <span class="aa-badge aa-sale" style="margin-top: 35px">SALE!</span>
                                        @elseif($item->hot == 1 && $item->disc == 0 && $item->qty == 0)
                                        <span class="aa-badge aa-hot">HOT!</span>
                                        <span class="aa-badge aa-sold-out" style="margin-top: 35px">Sold Out!</span>
                                        @elseif($item->hot == 0 && $item->disc > 0 && $item->qty == 0)
                                        <span class="aa-badge aa-sale">SALE!</span>
                                        <span class="aa-badge aa-sold-out" style="margin-top: 35px">Sold Out!</span>
                                        @elseif($item->hot == 1 && $item->disc > 0 && $item->qty == 0)
                                        <span class="aa-badge aa-sale">SALE!</span>
                                        <span class="aa-badge aa-hot" style="margin-top: 35px">HOT!</span>
                                        <span class="aa-badge aa-sold-out" style="margin-top: 70px">Sold Out!</span>
                                        @endif

                                    </li>
                                    @endforeach
                                    <!-- start single product item -->
                                </ul>
                                {{-- <a class="aa-browse-btn" href="javascript:void(0)">Browse all Product <span
                                        class="fas fa-arrow-right"></span></a> --}}
                            </div>
                            <!-- / popular product category -->

                            <!-- start featured product category -->
                            <div class="tab-pane fade" id="featured">
                                <ul class="aa-product-catg aa-featured-slider">
                                    <!-- start single product item -->
                                    @foreach ($featured as $item)
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" target="_blank"
                                                href="{{ url('product-detail?search='.$item->id) }}">
                                                @if (Storage::exists('public/'.$item->photo1))
                                                <img src="{{ url('/') }}/storage/{{ $item->photo1 }}" width="250px"
                                                    height="300px">
                                                @else
                                                    @if (Storage::exists('public/'.$item->photo2))
                                                    <img src="{{ url('/') }}/storage/{{ $item->photo2 }}" width="250px"
                                                        height="300px">
                                                    @else
                                                        @if (Storage::exists('public/'.$item->photo3))
                                                        <img src="{{ url('/') }}/storage/{{ $item->photo3 }}" width="250px"
                                                            height="300px">
                                                        @else
                                                        <img src="{{ url('/') }}/storage/products/404.jpg" width="250px"
                                                        height="300px">
                                                        @endif
                                                    @endif
                                                @endif
                                            </a>
                                            @if ($item->qty > 0)
                                            <a class="aa-add-card-btn add-to-mycart" data-prod_id="{{ $item->id }}"
                                                data-user_id="{{ Auth::id() ? Auth::id() : ''}}"
                                                href="javascript:void(0)">
                                                <span class="fa fa-shopping-cart"></span>
                                                เพิ่มไปยังรถเข็น
                                            </a>
                                            @else
                                            <a class="aa-add-card-btn" href="javascript:void(0)"
                                                onclick="return alert(&quot;สินค้าหมดคะ!&quot;)">
                                                <span class="far fa-times-circle"></span>
                                                Pre order
                                            </a>
                                            @endif
                                            <figcaption>
                                                <h4 class="aa-product-title">
                                                    <a href="{{ url('product-detail?search='.$item->id) }}"
                                                        target="_blank">
                                                        {{ $item->name }}
                                                    </a>
                                                </h4>
                                                <span
                                                    class="aa-product-price">฿{{ number_format($item->price - $item->disc,2) }}</span>
                                                @if ($item->disc > 0)
                                                <span class="aa-product-price">
                                                    <del>฿{{ number_format($item->price,2) }}</del>
                                                </span>
                                                @endif
                                            </figcaption>
                                        </figure>
                                        <div class="aa-product-hvr-content">
                                            <a class="add-to-wishlist" data-prod_id="{{ $item->id }}"
                                                href="javascript:void(0)"
                                                data-user_id="{{ Auth::id() ? Auth::id() : ''}}" data-toggle="tooltip"
                                                data-placement="top" title="Add to Wishlist">
                                                <span class="far fa-heart"></span>
                                            </a>
                                            <a class="add-to-likes" data-id="{{ $item->id }}" href="javascript:void(0)"
                                                data-user_id="{{ Auth::id() ? Auth::id() : ''}}" data-toggle="tooltip"
                                                data-placement="top" title="Like">
                                                <span class="far fa-thumbs-up"></span>
                                            </a>
                                            <a href="javascript:void(0)" data-toggle2="tooltip" data-placement="top"
                                                title="Quick View" data-toggle="modal" data-id="{{ $item->id }}"
                                                id="ShowModelProduct">
                                                <span class="fas fa-search"></span>
                                            </a>
                                        </div>
                                        <!-- product badge -->
                                        @if ($item->hot == 1 && $item->disc == 0 && $item->qty > 0)
                                        <span class="aa-badge aa-hot">HOT!</span>
                                        @elseif($item->hot == 0 && $item->disc > 0 && $item->qty > 0)
                                        <span class="aa-badge aa-sale">SALE!</span>
                                        @elseif($item->hot == 0 && $item->disc == 0 && $item->qty == 0)
                                        <span class="aa-badge aa-sold-out">Sold Out!</span>
                                        @elseif($item->hot == 1 && $item->disc > 0 && $item->qty > 0)
                                        <span class="aa-badge aa-hot">HOT!</span>
                                        <span class="aa-badge aa-sale" style="margin-top: 35px">SALE!</span>
                                        @elseif($item->hot == 1 && $item->disc == 0 && $item->qty == 0)
                                        <span class="aa-badge aa-hot">HOT!</span>
                                        <span class="aa-badge aa-sold-out" style="margin-top: 35px">Sold Out!</span>
                                        @elseif($item->hot == 0 && $item->disc > 0 && $item->qty == 0)
                                        <span class="aa-badge aa-sale">SALE!</span>
                                        <span class="aa-badge aa-sold-out" style="margin-top: 35px">Sold Out!</span>
                                        @elseif($item->hot == 1 && $item->disc > 0 && $item->qty == 0)
                                        <span class="aa-badge aa-sale">SALE!</span>
                                        <span class="aa-badge aa-hot" style="margin-top: 35px">HOT!</span>
                                        <span class="aa-badge aa-sold-out" style="margin-top: 70px">Sold Out!</span>
                                        @endif
                                    </li>
                                    <!-- start single product item -->
                                    @endforeach
                                </ul>
                                {{-- <a class="aa-browse-btn" href="javascript:void(0)">Browse all Product <span
                                        class="fas fa-arrow-right"></span></a> --}}
                            </div>
                            <!-- / featured product category -->

                            <!-- start latest product category -->
                            <div class="tab-pane fade" id="latest">
                                <ul class="aa-product-catg aa-latest-slider">
                                    <!-- start single product item -->
                                    @foreach ($latest as $item)
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" target="_blank"
                                                href="{{ url('product-detail?search='.$item->id) }}">
                                                @if (Storage::exists('public/'.$item->photo1))
                                                <img src="{{ url('/') }}/storage/{{ $item->photo1 }}" width="250px"
                                                    height="300px">
                                                @else
                                                    @if (Storage::exists('public/'.$item->photo2))
                                                    <img src="{{ url('/') }}/storage/{{ $item->photo2 }}" width="250px"
                                                        height="300px">
                                                    @else
                                                        @if (Storage::exists('public/'.$item->photo3))
                                                        <img src="{{ url('/') }}/storage/{{ $item->photo3 }}" width="250px"
                                                            height="300px">
                                                        @else
                                                        <img src="{{ url('/') }}/storage/products/404.jpg" width="250px"
                                                        height="300px">
                                                        @endif
                                                    @endif
                                                @endif
                                            </a>
                                            @if ($item->qty > 0)
                                            <a class="aa-add-card-btn add-to-mycart" data-prod_id="{{ $item->id }}"
                                                data-user_id="{{ Auth::id() ? Auth::id() : ''}}"
                                                href="javascript:void(0)">
                                                <span class="fa fa-shopping-cart"></span>
                                                เพิ่มไปยังรถเข็น
                                            </a>
                                            @else
                                            <a class="aa-add-card-btn" href="javascript:void(0)"
                                                onclick="return alert(&quot;สินค้าหมดคะ!&quot;)">
                                                <span class="far fa-times-circle"></span>
                                                Pre order
                                            </a>
                                            @endif
                                            <figcaption>
                                                <h4 class="aa-product-title">
                                                    <a href="{{ url('product-detail?search='.$item->id) }}"
                                                        target="_blank">
                                                        {{ $item->name }}
                                                    </a>
                                                </h4>
                                                <span
                                                    class="aa-product-price">฿{{ number_format($item->price - $item->disc,2) }}</span>
                                                @if ($item->disc > 0)
                                                <span class="aa-product-price">
                                                    <del>฿{{ number_format($item->price,2) }}</del>
                                                </span>
                                                @endif
                                            </figcaption>
                                        </figure>
                                        <div class="aa-product-hvr-content">
                                            <a class="add-to-wishlist" data-prod_id="{{ $item->id }}"
                                                href="javascript:void(0)"
                                                data-user_id="{{ Auth::id() ? Auth::id() : ''}}" data-toggle="tooltip"
                                                data-placement="top" title="Add to Wishlist">
                                                <span class="far fa-heart"></span>
                                            </a>
                                            <a class="add-to-likes" data-id="{{ $item->id }}" href="javascript:void(0)"
                                                data-user_id="{{ Auth::id() ? Auth::id() : ''}}" data-toggle="tooltip"
                                                data-placement="top" title="Like">
                                                <span class="far fa-thumbs-up"></span>
                                            </a>
                                            <a href="javascript:void(0)" data-toggle2="tooltip" data-placement="top"
                                                title="Quick View" data-toggle="modal" data-id="{{ $item->id }}"
                                                id="ShowModelProduct">
                                                <span class="fas fa-search"></span>
                                            </a>
                                        </div>
                                        <!-- product badge -->
                                        @if ($item->hot == 1 && $item->disc == 0 && $item->qty > 0)
                                        <span class="aa-badge aa-hot">HOT!</span>
                                        @elseif($item->hot == 0 && $item->disc > 0 && $item->qty > 0)
                                        <span class="aa-badge aa-sale">SALE!</span>
                                        @elseif($item->hot == 0 && $item->disc == 0 && $item->qty == 0)
                                        <span class="aa-badge aa-sold-out">Sold Out!</span>
                                        @elseif($item->hot == 1 && $item->disc > 0 && $item->qty > 0)
                                        <span class="aa-badge aa-hot">HOT!</span>
                                        <span class="aa-badge aa-sale" style="margin-top: 35px">SALE!</span>
                                        @elseif($item->hot == 1 && $item->disc == 0 && $item->qty == 0)
                                        <span class="aa-badge aa-hot">HOT!</span>
                                        <span class="aa-badge aa-sold-out" style="margin-top: 35px">Sold Out!</span>
                                        @elseif($item->hot == 0 && $item->disc > 0 && $item->qty == 0)
                                        <span class="aa-badge aa-sale">SALE!</span>
                                        <span class="aa-badge aa-sold-out" style="margin-top: 35px">Sold Out!</span>
                                        @elseif($item->hot == 1 && $item->disc > 0 && $item->qty == 0)
                                        <span class="aa-badge aa-sale">SALE!</span>
                                        <span class="aa-badge aa-hot" style="margin-top: 35px">HOT!</span>
                                        <span class="aa-badge aa-sold-out" style="margin-top: 70px">Sold Out!</span>
                                        @endif
                                    </li>
                                    @endforeach
                                    <!-- start single product item -->
                                </ul>
                                {{-- <a class="aa-browse-btn" href="javascript:void(0)">Browse all Product <span
                                        class="fas fa-arrow-right"></span></a> --}}
                            </div>
                            <!-- / latest product category -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / popular section -->

@endsection
