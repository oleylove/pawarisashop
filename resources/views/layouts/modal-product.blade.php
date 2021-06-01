<div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog">
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="row">
                    <!-- Modal view slider -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="aa-product-view-slider">
                            <div class="simpleLens-gallery-container" id="demo-1">
                                <div class="simpleLens-container">
                                    <div class="simpleLens-big-image-container">
                                        <a href="javascript:void(0)">
                                            <img id="bigimagephoto1" width="350px" height="400px">
                                        </a>
                                    </div>
                                </div>
                                <div class="simpleLens-thumbnails-container">
                                    <a href="javascript:void(0)" id="wrapperphoto1"
                                        class="simpleLens-thumbnail-wrapper">
                                        <img src="" alt="" id="lensphoto1" width="65xp" height="75xp">
                                    </a>
                                    <a href="javascript:void(0)" class="simpleLens-thumbnail-wrapper"
                                        id="wrapperphoto2">
                                        <img src="" alt="" id="lensphoto2" width="65xp" height="75xp">
                                    </a>
                                    <a href="javascript:void(0)" class="simpleLens-thumbnail-wrapper"
                                        id="wrapperphoto3">
                                        <img src="" alt="" id="lensphoto3" width="65xp" height="75xp">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal view content -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="aa-product-view-content">
                            <h3 class="title-model"></h3>
                            <div class="aa-price-block">
                                <span class="aa-product-view-price"></span>
                                <span class="aa-product-price"
                                    style="margin-left: 5px; color: tomato; text-decoration: line-through; font-size: 24px">
                                    <del></del>
                                </span>
                                <p class="aa-product-avilability"></p>
                            </div>
                            <p class="product-content"></p>
                            <div class="col-md" style="display: inline-block; margin-right: 10px;">
                                <h4>Size</h4>
                                <div class="aa-prod-view-size">
                                    <a href="javascript:void(0)" class="product-size"></a>
                                </div>
                            </div>
                            <div class="col-md" style="display: inline-block;">
                                <h4>Color</h4>
                                <div class="aa-prod-view-size">
                                    <a href="javascript:void(0)" class="product-color"></a>
                                </div>
                            </div>
                            <div class="aa-prod-quantity">
                                <div class="aa-your-rating">
                                    <p id="VoteScoreRating" style="font-size: 14px"></p>
                                    <div class="barra-rating">
                                        <span class="bg-rating"></span>
                                        <span class="stars-rating">
                                            @for($i=1; $i<=5; $i++) <span class="star-rating">
                                                <span class="starAbsolute-rating"
                                                    style="background-image: url({{ url('/') }}/storage/starvote/starpng.png);">
                                                </span>
                                        </span>
                                        @endfor
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="aa-prod-view-bottom">

                                <a class="aa-add-to-cart-btn add-to-mycart" data-prod_id="{{ $item->id }}"
                                    data-user_id="{{ Auth::id() ? Auth::id() : ''}}" href="javascript:void(0)"
                                    title="หยิบใส่ตะกร้า">
                                    <span class="fa fa-shopping-cart" style="font-size: 20px;"></span>
                                </a>

                                <a class="aa-add-to-cart-btn add-to-wishlist" data-prod_id="{{ $item->id }}"
                                    data-user_id="{{ Auth::id() ? Auth::id() : ''}}" href="javascript:void(0)"
                                    title="สนใจสินค้า">
                                    <span class="far fa-heart" style="font-size: 20px;"></span>
                                </a>

                                <a class="aa-add-to-cart-btn add-to-likes" data-prod_id="{{ $item->id }}"
                                    data-user_id="{{ Auth::id() ? Auth::id() : ''}}" href="javascript:void(0)"
                                    title="ถูกใจสินค้า">
                                    <span class="far fa-thumbs-up" style="font-size: 20px;"></span>
                                </a>

                                <a class="aa-add-to-cart-btn" id="productDetail" href="javascript:void(0)"
                                    title="รายละเอียดสินค้า" target="_bnak">
                                    <span style="font-size: 16px;">รายละเอียด</span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
