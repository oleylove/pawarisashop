<!-- start header top  -->
<div class="aa-header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-header-top-area">
                    <!-- start header top left -->
                    <div class="aa-header-top-left">
                        <!-- start cellphone -->
                        <div class="cellphone hidden-xs">
                            <p><span class="fab fa-facebook text-primary"></span><a href="{{ App\Config::first()->facebook }}" title="Facebook" target="_blank">facebook</a></p>
                        </div>
                        <div class="cellphone hidden-xs">
                            <p><span class="fab fa-line text-success"></span>{{ App\Config::first()->line }}</p>
                        </div>
                        <div class="cellphone hidden-xs">
                            <p><span class="fas fa-phone-square-alt text-danger"></span>{{ App\Config::first()->phone }}</p>
                        </div>

                        <!-- / cellphone -->
                    </div>
                    <!-- / header top left -->
                    <div class="aa-header-top-right">
                        <ul class="aa-head-top-nav-right">
                            @auth
                                @if(Auth::user()->role == 'guest')
                                    <li><a href="javascript:void(0)">Hi! {{ Auth::user()->name }}</a></li>
                                    <li class="hidden-xs"><a href="{{ url('myaccount') }}">บัญชีของฉัน</a></li>
                                    <li class="hidden-xs"><a href="{{ url('mywishlist') }}">สิ่งที่อยากได้</a></li>
                                    <li class="hidden-xs"><a href="{{ url('mycart') }}">รถเข็นของฉัน</a></li>
                                    <li class="hidden-xs"><a href="{{ url('mycheckout') }}">คำสั่งชื้อของฉัน</a></li>
                                    <li class="hidden-xs"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a></li>

                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="javascript:void(0)" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fas fa-caret-square-down"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a href="{{ url('myaccount') }}">บัญชีของฉัน</a><br>
                                            <a href="{{ url('mywishlist') }}">สิ่งที่อยากได้</a><br>
                                            <a href="{{ url('mycart') }}">รถเข็นของฉัน</a><br>
                                            <a href="{{ url('mycheckout') }}">คำสั่งชื้อของฉัน</a><br>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Logout</a>
                                        </div>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>

                                @else
                                    <li><a href="javascript:void(0)">Hi! {{ Auth::user()->name }}</a></li>
                                    <li class="hidden-xs"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                    <li class="hidden-xs"><a href="{{ url('order') }}">คำสั่งซื้อ</a></li>
                                    <li class="hidden-xs"><a href="{{ url('product') }}">รายการสินค้า</a></li>
                                    <li class="hidden-xs"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>

                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="javascript:void(0)" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fas fa-caret-square-down"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a href="{{ url('dashboard') }}">Dashboard</a><br>
                                            <a href="{{ url('order') }}">คำสั่งซื้อ</a><br>
                                            <a href="{{ url('product') }}">รายการสินค้า</a><br>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Logout</a>
                                        </div>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                </form>

                                @endif

                            @else
                            <li>
                                @if (Route::has('register'))
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#singin-modal">ลงทะเบียน</a>
                                @endif
                            </li>
                            <li>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#login-modal">เข้าสู่ระบบ</a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / header top  -->

<!-- start header bottom  -->
<div class="aa-header-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-header-bottom-area">
                    <!-- logo  -->
                    <div class="aa-logo">
                        <!-- Text based logo -->
                        <a href="{{ url('/') }}">
                            <span class="fa fa-shopping-cart"></span>
                            <p>PAWARISA-<strong>SHOP</strong> <span>ลงทะเบียนกับเราเพื่อรับแต้มสะสมแลกซื้อ</span></p>
                        </a>
                        <!-- img based logo -->
                        {{-- <a href="index.html"><img src="{{ url('/') }}/storage/img/logo.jpg" alt="logo img"></a> --}}
                    </div>
                    <!-- / logo  -->
                    <!-- cart box -->
                    @auth
                    <div class="aa-cartbox">
                        <a class="aa-cart-link" href="{{ url('mycart') }}">
                            <span class="fa fa-shopping-basket"></span>
                            <span class="aa-cart-title">SHOPPING CART</span>
                            <span class="aa-cart-notify">
                                {{ App\OrderProduct::whereNull('po_id')->where('user_id', Auth::id())->count() }}
                            </span>
                        </a>
                        <div class="aa-cartbox-summary">
                            <ul>
                                @foreach (App\OrderProduct::whereNull('po_id')->where('user_id',Auth::id())->latest()->get() as $item)
                                <li>
                                    <a class="aa-cartbox-img" href="javascript:void(0)">
                                        <img src="{{ url('/') }}/storage/{{ $item->product->photo1 }}">
                                    </a>
                                    <div class="aa-cartbox-info">
                                        <h4><a href="javascript:void(0)">{{ $item->product->title }}</a></h4>
                                        <p>{{ $item->qty . ' ชิ้น ' . number_format($item->net,2) . ' บาท'}}</p>
                                    </div>
                                    <a class="aa-remove-product" href="javascript:void(0)"><span class="fa fa-times"></span></a>
                                </li>
                                @endforeach
                                <li>
                                    <span class="aa-cartbox-total-title">
                                        รวมทั้งหมด
                                    </span>
                                    <span class="aa-cartbox-total-price">
                                        {{ number_format(App\OrderProduct::whereNull('po_id')->where('user_id', Auth::id())->sum('net'),2) . ' บาท' }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endauth
                    <!-- / cart box -->
                    <!-- search box -->
                    <div class="aa-search-box">
                        <form action="">
                            <input type="text" name="search" id="search" placeholder="ค้นหาสินค้าที่คุณต้องการค่ะ ">
                            <button type="submit"><span class="fa fa-search"></span></button>
                        </form>
                    </div>
                    <!-- / search box -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / header bottom  -->
