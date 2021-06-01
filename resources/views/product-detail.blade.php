@extends('layouts.dailyshop')

@section('title','Pawarisa Shop | Product Detail')

@section('content')
<!-- product category -->
<section id="aa-product-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-product-details-area">
                    <div class="aa-product-details-content">
                        <div class="row">
                            <!-- Modal view slider -->
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="aa-product-view-slider">
                                    <div id="demo-1" class="simpleLens-gallery-container">
                                        <div class="simpleLens-container">
                                            <div class="simpleLens-big-image-container">
                                                <a href="javascript:void(0)">
                                                    <img src="{{ url('/') }}/storage/{{ $product->photo1 }}"
                                                        class="simpleLens-big-image" width="350px" height="400px">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="simpleLens-thumbnails-container">
                                            <a data-big-image="{{ url('/') }}/storage/{{ $product->photo1 }}"
                                                class="simpleLens-thumbnail-wrapper" href="javascript:void(0)">
                                                <img src="{{ url('/') }}/storage/{{ $product->photo1 }}" width="65xp"
                                                    height="75xp">
                                            </a>
                                            <a data-big-image="{{ url('/') }}/storage/{{ $product->photo2 }}"
                                                class="simpleLens-thumbnail-wrapper" href="javascript:void(0)">
                                                <img src="{{ url('/') }}/storage/{{ $product->photo2 }}" width="65xp"
                                                    height="75xp">
                                            </a>
                                            <a data-big-image="{{ url('/') }}/storage/{{ $product->photo3 }}"
                                                class="simpleLens-thumbnail-wrapper" href="javascript:void(0)">
                                                <img src="{{ url('/') }}/storage/{{ $product->photo3 }}" width="65xp"
                                                    height="75xp">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal view content -->
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="aa-product-view-content">
                                    <h3>{{ $product->name }}</h3>
                                    <div class="aa-price-block">
                                        <p class="aa-product-view-price">$34.99</p>
                                        <p class="aa-product-avilability">สินค้าทั้งหมด :
                                            <span>{{ $product->qty }}</span></p>
                                        <p class="aa-product-avilability">ขายไปแล้ว : <span>{{ $product->sold }}</span>
                                        </p>
                                    </div>
                                    <p>{{ $product->title }}</p>
                                    <div class="col-md" style="display: inline-block; margin-right: 10px;">
                                        <h4>Size</h4>
                                        <div class="aa-prod-view-size">
                                            <a href="javascript:void(0)" class="product-size"> {{ $product->size }}</a>
                                        </div>
                                    </div>
                                    <div class="col-md" style="display: inline-block;">
                                        <h4>Color</h4>
                                        <div class="aa-prod-view-size">
                                            <a href="javascript:void(0)" class="product-color">{{ $product->color }}</a>
                                        </div>
                                    </div>
                                    {{-- <h4>Size</h4>
                                    <div class="aa-prod-view-size">
                                        <a href="javascript:void(0)">S</a>
                                        <a href="javascript:void(0)">M</a>
                                        <a href="javascript:void(0)">L</a>
                                        <a href="javascript:void(0)">XL</a>
                                    </div>
                                    <h4>Color</h4>
                                    <div class="aa-color-tag">
                                        <a href="javascript:void(0)" class="aa-color-green"></a>
                                        <a href="javascript:void(0)" class="aa-color-yellow"></a>
                                        <a href="javascript:void(0)" class="aa-color-pink"></a>
                                        <a href="javascript:void(0)" class="aa-color-black"></a>
                                        <a href="javascript:void(0)" class="aa-color-white"></a>
                                    </div> --}}
                                    <div class="aa-your-rating">
                                        <p>
                                            {{ 'คะแนนสินค้า : Vote:'.$product->vote .' | Score:'.$product->score .' | Rating:'.$product->rating .' | Like:'.$product->likes.'' }}
                                        </p>

                                        <span class="ratingAverage2" data-average2="{{ $product->rating }}"></span>
                                        <div class="barra2">
                                            <span class="bg2"></span>
                                            <span class="stars2">
                                                @for($i=1; $i<=5; $i++) <span class="star2" data-vote="{{ $i }}">
                                                    <span class="starAbsolute2"
                                                        style="background-image: url({{ url('/') }}/storage/starvote/starpng.png);">
                                                    </span>
                                            </span>
                                            @endfor
                                            </span>
                                        </div>
                                    </div>
                                    {{-- <div class="aa-prod-quantity">
                                        <select id="qty" name="qty">
                                                <option selected="1" value="0">1</option>
                                                <option value="1">2</option>
                                                <option value="2">3</option>
                                                <option value="3">4</option>
                                                <option value="4">5</option>
                                                <option value="5">6</option>
                                            </select>
                                        <p class="aa-prod-category">
                                            Category : <a href="javascript:void(0)">
                                                {{ $product->category_sub->name }}
                                            </a>
                                        </p>
                                    </div> --}}
                                    <div class="aa-prod-view-bottom">
                                        @if ($product->qty > 0)
                                        <a class="aa-add-to-cart-btn add-to-mycart" data-prod_id="{{ $product->id }}" data-user_id="{{ Auth::id() ? Auth::id() : ''}}"
                                            href="javascript:void(0)" title="หยิบใส่ตะกร้า">
                                            <span class="fa fa-shopping-cart" style="font-size: 20px;"></span>
                                            เพิ่มไปยังรถเข็น
                                        </a>
                                        @else
                                        <a class="aa-add-to-cart-btn" href="javascript:void(0)" title="สินค้าหมด" onclick="return alert(&quot;สินค้าหมดคะ!&quot;)">
                                            <span class="far fa-times-circle" style="font-size: 20px;"></span>
                                            Pre order
                                        </a>
                                        @endif

                                        <a class="aa-add-to-cart-btn add-to-wishlist" data-prod_id="{{ $product->id }}" data-user_id="{{ Auth::id() ? Auth::id() : ''}}"
                                            href="javascript:void(0)" title="สนใจสินค้า">
                                            <span class="far fa-heart" style="font-size: 20px;"></span>
                                            สนใจสินค้า
                                        </a>
                                        <a class="aa-add-to-cart-btn add-to-likes" data-prod_id="{{ $product->id }}" data-user_id="{{ Auth::id() ? Auth::id() : ''}}" href="javascript:void(0)" title="ถูกใจสินค้า">
                                            <span class="far fa-thumbs-up" style="font-size: 20px;"></span>
                                            ถูกใจสินค้า
                                        </a>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Tab รีวิวสินค้า --}}

                    <div class="aa-product-details-bottom">
                        <ul class="nav nav-tabs" id="myTab2">
                            <li><a href="#description" data-toggle="tab">รายละเอียดสินค้า</a></li>
                            <li><a href="#review" data-toggle="tab">รีวิวสินค้า</a></li>
                        </ul>
                        {{-- Tab รีวิวสินค้า --}}
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="description">
                                <p> {{ $product->content }}</p>
                            </div>
                            <div class="tab-pane fade " id="review">
                                <div class="aa-product-review-area">
                                    <h4>{{ $review->count() .' รีวิว สำหรับ'. $product->name }} </h4>
                                    <ul class="aa-review-nav">
                                        @foreach ($review as $item)
                                        <li>
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="javascript:void(0)">
                                                        <img class="media-object"
                                                            src="{{ url('/') }}/storage/{{ $item->user->photo}}">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><strong>{{ $item->user->name}}</strong>
                                                        <span>
                                                            {{ 'เมื่อ ' .get_dateTime($item->created_at)}}
                                                        </span></h4>
                                                    <div class="aa-product-rating">
                                                        @if ($vote_ck)
                                                        @switch($vote_ck->score)
                                                        @case(1)
                                                        <span class="fa fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        @break
                                                        @case(2)
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        @break
                                                        @case(3)
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        @break
                                                        @case(4)
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        @break
                                                        @case(5)
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        @break
                                                        @endswitch
                                                        @else
                                                        <span class="far fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        <span class="far fa-star"></span>
                                                        @endif
                                                    </div>
                                                    <p>{{ $item->comment }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @auth
                                    <h4>รีวิวสินค้า</h4>
                                    <h3>
                                        <a href="javascript:void(0)" class="vote">Vote :
                                            <span>{{ $product->vote }}</span></a> |
                                        <a href="javascript:void(0)" class="totalScore">Score :
                                            <span>{{ $product->score }}</span></a> |
                                        <a href="javascript:void(0)" class="rating">Rating :
                                            <span>{{ $product->rating }}</span></a>
                                    </h3>
                                    <form method="POST" action="{{ route('comment') }}" accept-charset="UTF-8"
                                        class="aa-review-form form-horizontal was-validated"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="aa-your-rating">
                                            @if ($vote_ck)
                                            <p>คะแนนคุณที่ให้กับสินค้านี้</p>
                                            <span class="ratingAverage" data-average="{{ $vote_ck->score }}"></span>
                                            <span class="prod_id" data-id="{{ $product->id }}"></span>
                                            <div class="barra">
                                                <span class="bg"></span>
                                                <span class="stars">
                                                    @for($i=1; $i<=5; $i++) <span class="star" data-vote="{{ $i }}"
                                                        id="voteProduct">
                                                        <span class="starAbsolute"
                                                            style="background-image: url({{ url('/') }}/storage/starvote/starpng.png);">
                                                        </span>
                                                </span>
                                                @endfor
                                            </div>
                                            @else
                                            <p>ให้คะแนนสำหรับสินค้านี้</p>
                                            <span class="prod_id" data-id="{{ $product->id }}"></span>
                                            <div class="barra">
                                                <span class="bg"></span>
                                                <span class="stars">
                                                    @for($i=1; $i<=5; $i++) <span class="star" data-vote="{{ $i }}"
                                                        id="voteProduct">
                                                        <span class="starAbsolute"
                                                            style="background-image: url({{ url('/') }}/storage/starvote/starpng.png);">
                                                        </span>
                                                </span>
                                                @endfor
                                            </div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}"
                                                required>
                                            <input type="hidden" name="prod_id" id="prod_id"
                                                value="{{ request('search') }}" required>
                                            <label for="message">Your Comment</label>
                                            <textarea class="form-control" name="comment" id="comment">
                                            </textarea>
                                        </div>
                                        <button type="submit" class="btn btn-default aa-review-submit">Comment</button>
                                    </form>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Related product -->
                    <div class="aa-product-related-item">
                        <h3>สินค้าที่เกี่ยวข้อง</h3>
                        <ul class="aa-product-catg aa-related-item-slider">
                            <!-- start single product item -->
                            @foreach ($related as $item)
                            <li>
                                <figure>
                                    <a class="aa-product-img" href="{{ url('product-detail?search='.$item->id) }}"
                                        target="_blank">
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
                                    <a class="aa-add-card-btn add-to-mycart" data-prod_id="{{ $item->id }}" data-user_id="{{ Auth::id() ? Auth::id() : ''}}"
                                        href="javascript:void(0)">
                                        <span class="fa fa-shopping-cart"></span>
                                        เพิ่มไปยังรถเข็น
                                    </a>
                                    @else
                                    <a class="aa-add-card-btn" href="javascript:void(0)">
                                        <span class="far fa-times-circle"></span>
                                        Pre order
                                    </a>
                                    @endif
                                    <figcaption>
                                        <h4 class="aa-product-title">
                                            <a href="{{ url('product-detail?search='.$item->id) }}" target="_blank">
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
                                    <a class="add-to-wishlist" data-prod_id="{{ $item->id }}" data-user_id="{{ Auth::id() ? Auth::id() : ''}}" href="javascript:void(0)"
                                        data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                        <span class="far fa-heart"></span>
                                    </a>
                                    <a class="add-to-likes" data-prod_id="{{ $item->id }}" data-user_id="{{ Auth::id() ? Auth::id() : ''}}" href="javascript:void(0)"
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
                        <!-- quick view modal -->
                        @include('layouts.modal-product')
                        <!-- / quick view modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / product category -->

@endsection
