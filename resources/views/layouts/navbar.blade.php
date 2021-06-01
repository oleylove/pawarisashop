<div class="container">
    <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <!-- Left nav -->
                <ul class="nav navbar-nav">
                    @auth
                    <li><a href="{{ url('/home') }}">หน้าแรก</a></li>
                    @else
                    <li><a href="{{ url('/') }}">หน้าแรก</a></li>
                    @endauth
                    <li><a href="{{ url('products') }}">กางเกงยีนส์แฟชั่น</a></li>
                    <li><a href="{{ url('contact-shop') }}">ติดต่อเรา</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
