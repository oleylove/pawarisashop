@extends('layouts.dailyshop')

@section('title','Pawarisa Shop | Product')

@section('content')

<!-- product category -->
<section id="aa-product-category">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                <div class="aa-product-catg-content">
                    <div class="aa-product-catg-head">
                        <div class="aa-product-catg-head-left">
                            <form action="" class="aa-sort-form">
                                <label for="">Sort by</label>
                                <select name="">
                                    <option value="1" selected="Default">Default</option>
                                    <option value="2">Name</option>
                                    <option value="3">Price</option>
                                    <option value="4">Date</option>
                                </select>
                            </form>
                            <form action="" class="aa-show-form">
                                <label for="">Show</label>
                                <select name="">
                                    <option value="1" selected="12">12</option>
                                    <option value="2">24</option>
                                    <option value="3">36</option>
                                </select>
                            </form>
                        </div>
                        <div class="aa-product-catg-head-right">
                            <a id="grid-catg" href="javascript:void(0)"><span class="fa fa-th"></span></a>
                            <a id="list-catg" href="javascript:void(0)"><span class="fa fa-list"></span></a>
                        </div>
                    </div>
                    <div class="aa-product-catg-body">
                        <ul class="aa-product-catg">
                            <!-- start single product item -->
                            @foreach ($products as $item)
                            <li>
                                <figure>
                                    <a class="aa-product-img" href="{{ url('product-detail?search='.$item->id) }}"
                                        target="_bank">
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
                                        <p class="aa-product-descrip">
                                            {{ $item->title }}
                                        </p>
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
                        </ul>

                        <!-- quick view modal -->
                        @if ($products->count())
                        @include('layouts.modal-product')
                        @endif
                        <!-- / quick view modal -->

                    </div>

                    <div class="aa-product-catg-pagination">
                        <nav>
                            {!! $products->appends(['category' => Request::get('category')])->render() !!}
                        </nav>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                <aside class="aa-sidebar">
                    <!-- single sidebar -->
                    {{-- <div class="aa-sidebar-widget">
                        <h3>Category</h3>
                        <ul class="aa-catg-nav">
                            @foreach ($cat as $item)
                            <li>
                                <a href="{{ url('products?category='.$item->id.'&name='.$item->name) }}">
                    {{ $item->name }}
                    </a>
                    </li>
                    @endforeach
                    </ul>
            </div> --}}
            <!-- single sidebar -->
            {{-- <div class="aa-sidebar-widget">
                        <h3>Tags</h3>
                        <div class="tag-cloud">
                            @foreach ($cat_sub as $item)
                            <a href={{ url('products?category_sub='.$item->id.'&name='.$item->name) }}>
            {{ $item->name }}
            </a><br>
            @endforeach
        </div>
    </div> --}}
    <!-- single sidebar -->
    {{-- <div class="aa-sidebar-widget">
                        <h3>Shop By Price</h3>
                        <!-- price range -->
                        <div class="aa-sidebar-price-range">
                            <form action="">
                                <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                                </div>
                                <span id="skip-value-lower" class="example-val">30.00</span>
                                <span id="skip-value-upper" class="example-val">100.00</span>
                                <button class="aa-filter-btn" type="submit">Filter</button>
                            </form>
                        </div>
                    </div> --}}
    <!-- single sidebar -->
    {{-- <div class="aa-sidebar-widget">
                        <h3>Shop By Color</h3>
                        <div class="aa-color-tag">
                            <a class="aa-color-green" href="javascript:void(0)"></a>
                            <a class="aa-color-yellow" href="javascript:void(0)"></a>
                            <a class="aa-color-pink" href="javascript:void(0)"></a>
                            <a class="aa-color-purple" href="javascript:void(0)"></a>
                            <a class="aa-color-blue" href="javascript:void(0)"></a>
                            <a class="aa-color-orange" href="javascript:void(0)"></a>
                            <a class="aa-color-gray" href="javascript:void(0)"></a>
                            <a class="aa-color-black" href="javascript:void(0)"></a>
                            <a class="aa-color-white" href="javascript:void(0)"></a>
                            <a class="aa-color-cyan" href="javascript:void(0)"></a>
                            <a class="aa-color-olive" href="javascript:void(0)"></a>
                            <a class="aa-color-orchid" href="javascript:void(0)"></a>
                        </div>
                    </div> --}}
    <!-- single sidebar -->
    <div class="aa-sidebar-widget">
        <h3>Recently Views</h3>
        <div class="aa-recently-views">
            <ul>
                @foreach ($recently as $item)
                <li>
                    <a href="javascript:void(0)" class="aa-cartbox-img"><img alt="img"
                            src="{{ url('/') }}/storage/{{ $item->photo1	}}"></a>
                    <div class="aa-cartbox-info">
                        <h4><a href="javascript:void(0)">{{ $item->name	}}</a></h4>
                        <p>฿{{ number_format($item->price,2)	}}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- single sidebar -->
    <div class="aa-sidebar-widget">
        <h3>Top Rated Products</h3>
        <div class="aa-recently-views">
            <ul>
                @foreach ($popular as $item)
                <li>
                    <a href="javascript:void(0)" class="aa-cartbox-img"><img alt="img"
                            src="{{ url('/') }}/storage/{{ $item->photo1	}}"></a>
                    <div class="aa-cartbox-info">
                        <h4><a href="javascript:void(0)">{{ $item->name	}}</a></h4>
                        <p>฿{{ number_format($item->price,2)	}}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    </aside>
    </div>
    </div>
    </div>
</section>
<!-- / product category -->

@endsection
