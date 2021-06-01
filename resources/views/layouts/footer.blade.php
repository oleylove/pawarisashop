{{--
<!-- Subscribe section -->
<section id="aa-subscribe">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-subscribe-area">
                    <h3>Subscribe our newsletter </h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
                    <form action="" class="aa-subscribe-form">
                        <input type="email" name="" id="" placeholder="Enter your Email">
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Subscribe section -->


<!-- footer bottom -->
<div class="aa-footer-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-footer-top-area">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="aa-footer-widget">
                                <h3>Main Menu</h3>
                                <ul class="aa-footer-nav">
                                    <li><a href="javascript:void(0)">Home</a></li>
                                    <li><a href="javascript:void(0)">Our Services</a></li>
                                    <li><a href="javascript:void(0)">Our Products</a></li>
                                    <li><a href="javascript:void(0)">About Us</a></li>
                                    <li><a href="javascript:void(0)">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="aa-footer-widget">
                                <div class="aa-footer-widget">
                                    <h3>KhaoPan Shop</h3>
                                    <ul class="aa-footer-nav">
                                        <li><a href="javascript:void(0)">Delivery</a></li>
                                        <li><a href="javascript:void(0)">Returns</a></li>
                                        <li><a href="javascript:void(0)">Services</a></li>
                                        <li><a href="javascript:void(0)">Discount</a></li>
                                        <li><a href="javascript:void(0)">Special Offer</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="aa-footer-widget">
                                <div class="aa-footer-widget">
                                    <h3>Payment Method</h3>
                                    <ul class="aa-footer-nav">
                                        <li><a href="javascript:void(0)">Site Map</a></li>
                                        <li><a href="javascript:void(0)">Search</a></li>
                                        <li><a href="javascript:void(0)">Advanced Search</a></li>
                                        <li><a href="javascript:void(0)">Suppliers</a></li>
                                        <li><a href="javascript:void(0)">FAQ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="aa-footer-widget">
                                <div class="aa-footer-widget">
                                    <h3>Contace</h3>
                                    <address>
                                        <p> KhaoPan Shop 25 Astor Pl, NY 16253</p>
                                        <p><span class="fa fa-phone"></span>088-328-8235</p>
                                        <p><span class="fa fa-envelope"></span>khaopan.shop@gmail.com</p>
                                    </address>
                                    <div class="aa-footer-social">
                                        <a href="javascript:void(0)"><span class="fab fa-facebook"></span></a>
                                        <a href="javascript:void(0)"><span class="fab fa-twitter"></span></a>
                                        <a href="javascript:void(0)"><span class="fab fa-line"></span></a>
                                        <a href="javascript:void(0)"><span class="fab fa-youtube"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Support section -->
<section id="aa-support">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-support-area">
                    <!-- single support -->
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fa fa-truck"></span>
                            <h4>FREE SHIPPING {{ number_format(App\Config::first()->freeshipping,2) }} UP</h4>
                            <P></P>
                        </div>
                    </div>
                    <!-- single support -->
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fa fa-clock-o"></span>
                            <h4>DELIVERY EVERY DAY</h4>
                            <P></P>
                        </div>
                    </div>
                    <!-- single support -->
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fa fa-phone"></span>
                            <h4>{{ App\Config::first()->phone }}</h4>
                            <P></P>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fab fa-line"></span>
                            <h4>{{ App\Config::first()->line }}</h4>
                            <P></P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Support section -->

