<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Font awesome -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{ asset('css/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.simpleLens.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nouislider.css') }}">
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('css/theme-color/default-theme.css') }}" rel="stylesheet">
    <!-- <link id="switcher" href="{{ asset('css/theme-color/bridge-theme.css') }}" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="{{ asset('css/sequence-theme.modern-slide-in.css') }}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rating.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- wpf loader Two -->
    <div id="wpf-loader-two">
        <div class="wpf-loader-two-inner">
            <span>Loading</span>
        </div>
    </div>
    <!-- / wpf loader Two -->
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="javascript:void(0)"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->

    <!-- Start header section -->
    <header id="aa-header">
        <!-- start header top  -->
        <!-- start header bottom  -->
        @include('layouts.header')
        <!-- / header top  -->
        <!-- / header bottom  -->
    </header>
    <!-- / header section -->

    <!-- menu -->
    <section id="menu">
        <!--  navbar -->
        @include('layouts.navbar')
        <!-- / navbar -->
    </section>
    <!-- / menu -->

    <!-- content -->
    @yield('content')
    <!-- / content -->

    <!-- footer -->
    <footer id="aa-footer">
        <!-- footer bottom -->
        @include('layouts.footer')
        <!-- / footer-bottom -->
    </footer>
    <!-- / footer -->

    <!-- Login Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Login or Register</h4>
                    <form class="aa-login-form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <label for="email">Email address<span>*</span></label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="password">Password<span>*</span></label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <button class="aa-browse-btn" type="submit">Login</button>
                        <label for="rememberme" class="rememberme">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            Remember me
                        </label>
                        <p class="aa-lost-password">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password ?
                            </a>
                            @endif
                        </p>
                        <div class="aa-register-now">
                            Don't have an account ?
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register now!</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <!-- Singin Modal -->
    <div class="modal fade" id="singin-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Register</h4>
                    <form class="aa-login-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <label for="">ชื่อ-สกุล<span>*</span></label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="">อีเมลล์<span>*</span></label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="">รหัสผ่าน<span>*</span></label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="">ยืนยันรหัสผ่าน<span>*</span></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                        <button type="submit" class="aa-browse-btn">Register</button>
                        <label for="rememberme" class="rememberme"></label>
                        <p class="aa-lost-password">
                            <a class="btn btn-link" href="javascript:void(0)"></a>
                        </p>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>



    <!-- jQuery library -->
    <script src="{{ asset('js/jquery1.11.3.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="{{ asset('js/jquery.smartmenus.js') }}"></script>
    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="{{ asset('js/jquery.smartmenus.bootstrap.js') }}"></script>
    <!-- To Slider JS -->
    <script src="{{ asset('js/sequence.js') }}"></script>
    <script src="{{ asset('js/sequence-theme.modern-slide-in.js') }}"></script>
    <!-- Product view slider -->
    <script type="text/javascript" src="{{ asset('js/jquery.simpleGallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.simpleLens.js') }}"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="{{ asset('js/slick.js') }}"></script>
    <!-- Price picker slider -->
    <script type="text/javascript" src="{{ asset('js/nouislider.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('js/custom.js') }}"></script>

    <script type="text/javascript">
        function autoTab(obj, typeCheck) {
            if (typeCheck == 1) {
                var pattern = new String("_-____-_____-__-_"); // กำหนดรูปแบบในนี้
                var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
            } else {
                var pattern = new String("___-___-____"); // กำหนดรูปแบบในนี้
                var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
            }
            var returnText = new String("");
            var obj_l = obj.value.length;
            var obj_l2 = obj_l - 1;
            for (i = 0; i < pattern.length; i++) {
                if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
                    returnText += obj.value + pattern_ex;
                    obj.value = returnText;
                }
            }
            if (obj_l >= pattern.length) {
                obj.value = obj.value.substr(0, pattern.length);
            }
        }
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // เพิ่มไปยังรถเข็นของลูกค้า
        $('body').on('click', '.add-to-mycart', function() {
            let prod_id = $(this).data('prod_id');
            let user_id = $(this).data('user_id');
            if (user_id) {
                $.ajax({
                    url: "{{ url('order-product-mycart?prod_id=') }}"+prod_id,
                    type: "GET",
                    success: function(data) {
                        if(data.success){
                            alert(data.success);
                        }else{
                            alert('เกิดข้อผิดพลาด? ไม่สามารถเพิ่มสินค้าลงในตระกร้าได้!');
                        }
                    },
                    error: function(data) {
                        alert('Error:', data);
                    }
                });

            } else {
                alert('กรุณาเข้าสู่ระบบก่อนคะ!');
            }
        });

        // เพิ่มไปยังสิ่งที่อยากได้
        $('body').on('click', '.add-to-wishlist', function() {
            let prod_id = $(this).data('prod_id');
            let user_id = $(this).data('user_id');
            if (user_id) {
                $.ajax({
                    url: "{{ url('order-product-mywishlist?prod_id=') }}"+prod_id,
                    type: "GET",
                    success: function(data) {
                        if(data.success){
                            alert(data.success);
                        }else{
                            alert('เกิดข้อผิดพลาด? ไม่สามารถเพิ่มสินค้าที่คุณสใจได้คะ!');
                        }
                    },
                    error: function(data) {
                        alert('Error:', data);
                    }
                });

            } else {
                alert('กรุณาเข้าสู่ระบบก่อนคะ!');
            }
        });

        // ลูกค้ากดถูกใจ
        $('body').on('click', '.add-to-likes', function() {
            let prod_id = $(this).data('prod_id');
            let user_id = $(this).data('user_id');
            if (user_id) {
                $.ajax({
                    url: "{{ url('order-product-mylikes') }}" + '/' + prod_id,
                    type: "GET",
                    success: function(data) {
                        if(data.success){
                            alert(data.success);
                        }else{
                            alert('เกิดข้อผิดพลาด? คุณถูกใจสินค้านี้ไม่ได้!');
                        }
                    },
                    error: function(data) {
                        alert('Error:', data);
                    }
                });

            } else {
                alert('กรุณาเข้าสู่ระบบก่อนคะ!');
            }
        });

        // ลูกค้าแก้ไขบัญชี
        $('body').on('click', '#editMyAccount', function() {
            let id = $(this).data('id');
            $('#formMyAccount')[0].reset();
            $.get("{{ url('myaccount-edit') }}" + '/' + id, function(data) {
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#phone').val(data.phone);
                $('#address').val(data.address);
            });
        });

        // ลูกค้าให้คะแนน
        $('body').on('click', '#voteProduct', function() {
            let id = $('.prod_id').attr('data-id');
            let score = $(this).attr('data-vote');
            $.get("{{ url('vote') }}" + '/' + id + '/' + score, function(data) {
                $('.vote span').html(data.vote);
                $('.totalScore span').html(data.score);
                $('.rating span').html(data.rating);
                $('#id').val(data.id);
                $('#score').val(data.score);
            });
        });

        // ลูกค้ากดโชว์สินค้า
        $('body').on('click', '#ShowModelProduct', function() {
            let id = $(this).attr('data-id');
            $.get("{{ url('product-model-show') }}" + '/' + id, function(data) {
                $('#quick-view-modal').modal('show');
                $('#quick-view-modal .title-model').html(data.name);
                $('#quick-view-modal .aa-product-view-price').html('฿'+ (data.price - data.disc).toFixed(2));
                if (data.disc > 0) {
                    $('#quick-view-modal .aa-product-price del').html('฿'+ data.price.toFixed(2));
                } else {
                    $('#quick-view-modal .aa-product-price del').html('');
                }
                if (data.qty == 0) {
                    $('#quick-view-modal .aa-product-avilability').html('<span>สินค้า Preorder</span>');
                } else {
                    $('#quick-view-modal .aa-product-avilability').html('Stock: <span>'+ data.qty +' ชิ้น</span>');
                }
                $("#quick-view-modal #bigimagephoto1").attr('src',"{{ url('/') }}/storage/"+ data.photo1);
                $("#quick-view-modal #lensphoto1").attr('src',"{{ url('/') }}/storage/"+ data.photo1);
                $("#quick-view-modal #wrapperphoto1").attr('data-big-image',"{{ url('/') }}/storage/"+ data.photo1);
                $("#quick-view-modal #lensphoto2").attr('src',"{{ url('/') }}/storage/"+ data.photo2 +'');
                $("#quick-view-modal #wrapperphoto2").attr('data-big-image',"{{ url('/') }}/storage/"+ data.photo2);
                $("#quick-view-modal #lensphoto3").attr('src',"{{ url('/') }}/storage/"+ data.photo3);
                $("#quick-view-modal #wrapperphoto3").attr('data-big-image',"{{ url('/') }}/storage/"+ data.photo3);
                $("#quick-view-modal .aa-product-view-content .product-content").html(data.content);
                $("#quick-view-modal .aa-prod-view-size .product-size").html(data.size);
                $("#quick-view-modal .aa-prod-view-size .product-color").html(data.color);
                $("#quick-view-modal .aa-prod-category a").html(data.name);
                $("#quick-view-modal .aa-prod-view-bottom #addToMyCart").attr('href',"{{ url('order-product-mycart?id=') }}"+ data.id);
                $("#quick-view-modal .aa-prod-view-bottom #productDetail").attr('href',"{{ url('product-detail?search=') }}"+ data.id);
                $("#quick-view-modal #VoteScoreRating").html('คะแนนสินค้า : Vote:'+ data.vote +' | Score:'+ data.score +' | Rating:'+ data.rating +' | Like:'+ data.likes);

                let rating = data.rating;
                function avaliacao(rating) {
                    rating = (Number(rating) * 20);
                    $('.bg-rating').css('width', 0);
                    $('.barra-rating .bg-rating').animate({ width: rating + '%' }, 500);
                }
                avaliacao(rating);
            });
        });

    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            //Check Image file Receipt
            $("#slip").change(function() {
                let file = this.files[0];
                let fileType = file.type;
                let match = ['image/jpeg', 'image/png'];
                if (!((fileType == match[0]) || (fileType == match[1]))) {
                    alert('กรุณาเลือกไฟล์สลิปที่โอนคะ....!');
                    $("#slip").val('');
                    return false;
                }
            });

            $("#slip").on("change", function(e) {
                let files = this.files
                showReceipt(files)
            });

            // SHOW Receipt
            function showReceipt(files) {
                $("#receipt").html("");
                for (var i = 0; i < files.length; i++) {
                    let file = files[i]
                    let image = document.createElement("img");
                    let receipt = document.getElementById("receipt");
                    image.file = file;
                    receipt.appendChild(image)

                    let reader = new FileReader()
                    reader.onload = (function(aImg) {
                        return function(e) {
                            aImg.src = e.target.result;
                        };
                    }(image))

                    let ret = reader.readAsDataURL(file);
                    let canvas = document.createElement("canvas");
                    ctx = canvas.getContext("2d");
                    image.onload = function() {
                        ctx.drawImage(image, 200, 200)
                    }
                } // end for loop
            } // end receipt
        });
    </script>

    <script type="text/javascript">
        $(function() {
        let average = $('.ratingAverage').attr('data-average');
        function avaliacao(average) {
            average = (Number(average) * 20);
            $('.bg').css('width', 0);
            $('.barra .bg').animate({ width: average + '%' }, 500);
        }
            avaliacao(average);
            $('.star').on('mouseover', function() {
                let indexAtual = $('.star').index(this);
                for (let i = 0; i <= indexAtual; i++) {
                    $('.star:eq(' + i + ')').addClass('full');
                }
            });

            $('.star').on('mouseout', function() {
                $('.star').removeClass('full');
            });
        });

        $(function() {
            let average2 = $('.ratingAverage2').attr('data-average2');
            function avaliacao(average2) {
                average2 = (Number(average2) * 20);
                $('.bg2').css('width', 0);
                $('.barra2 .bg2').animate({ width: average2 + '%' }, 500);
            }
            avaliacao(average2);
        });

    </script>

</body>

</html>
