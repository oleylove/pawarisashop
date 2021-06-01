<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- CSS Files Font Awesome Free 5.13.0 -->
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rating.css') }}" rel="stylesheet">
<style>
    .photo1show img{
        width: 250px;
        height: 300px;
    }
    .photo2show img{
        width: 250px;
        height: 300px;
    }
    .photo3show img{
        width: 250px;
        height: 300px;
    }
</style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    https://pawarisa-shop.com
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>



                @if ($errors->has('current_password'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>ผิดพลาด!</strong> รหัสผ่านเดิมไม่ถูกต้องคะ
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if ($errors->has('new_confirm_password'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>ผิดพลาด! </strong> รหัสยืนยันไม่ตรงกันคะ
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <strong>สำเร็จ!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>ผิดพลาด!</strong> {{ (session('error')) }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    @foreach ($errors->all() as $error)
                    <strong>ผิดพลาด!</strong> {{ $error }}<br>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="javascript:void(0)" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>

            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
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

    <!-- JS Files DataTables Ajax -->
    <script type="text/javascript">
        $(document).ready(function() {
            // Modal Show Photo Product
            $("#dataProd").on('click', '#photoProd', function() {
                $('#ModalPhotoProd').modal('show');
                $('.modal-title').html($(this).data('title'));
                $('#ModalPhotoProd #PhotoProduct').attr('src','{{ url('/') }}/storage/'+ $(this).data('img') +'');

            });
            // Check Upload Photo Product
            $("#photo1").change(function() {
                var file = this.files[0];
                var fileType = file.type;
                var match = ['image/jpeg', 'image/png'];
                if (!((fileType == match[0]) || (fileType == match[1]))) {
                    alert('กรุณาเลือกไฟล์รูปภาพเท่านั้นค่ะ......');
                    $("#photo1").val('');
                    return false;
                }
            });
            $("#photo1").on("change", function(e) {
                let files = this.files
                showPhoto1(files)
            });

            // SHOW Receipt
            function showPhoto1(files) {
                $("#photo1show").html("");
                for (var i = 0; i < files.length; i++) {
                    let file = files[i]
                    let image = document.createElement("img");
                    let receipt = document.getElementById("photo1show");
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

            $("#photo2").change(function() {
                var file = this.files[0];
                var fileType = file.type;
                var match = ['image/jpeg', 'image/png'];
                if (!((fileType == match[0]) || (fileType == match[1]))) {
                    alert('กรุณาเลือกไฟล์รูปภาพเท่านั้นค่ะ......');
                    $("#photo2").val('');
                    return false;
                }
            });
            $("#photo2").on("change", function(e) {
                let files = this.files
                showPhoto2(files)
            });
            // SHOW Receipt
            function showPhoto2(files) {
                $("#photo2show").html("");
                for (var i = 0; i < files.length; i++) {
                    let file = files[i]
                    let image = document.createElement("img");
                    let receipt = document.getElementById("photo2show");
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

            $("#photo3").change(function() {
                var file = this.files[0];
                var fileType = file.type;
                var match = ['image/jpeg', 'image/png'];
                if (!((fileType == match[0]) || (fileType == match[1]))) {
                    alert('กรุณาเลือกไฟล์รูปภาพเท่านั้นค่ะ......');
                    $("#photo3").val('');
                    return false;
                }
            });
            $("#photo3").on("change", function(e) {
                let files = this.files
                showPhoto3(files)
            });
            // SHOW Receipt
            function showPhoto3(files) {
                $("#photo3show").html("");
                for (var i = 0; i < files.length; i++) {
                    let file = files[i]
                    let image = document.createElement("img");
                    let receipt = document.getElementById("photo3show");
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


            $("#dataOrder").on('click', '#slipOrder', function() {
                var status = $(this).data('status');
                $('#ModalSlipOrder #data-tracking').html('');
                $('#ModalSlipOrder #data-shipping').html('');
                $('#ModalSlipOrder #data-consignee').html('');
                $('#ModalSlipOrder').modal('show');
                $('#FormSlipOrder')[0].reset();
                $('#ModalSlipOrder .modal-title').html('คำสั่งซื้อ # '+ $(this).data('id'));
                $('#ModalSlipOrder #slipOrder').attr('src','{{ url('/') }}/storage/'+ $(this).data('img') +'');
                $('#ModalSlipOrder #id').val($(this).data('id'));
                if(status == 'รอตรวจสอบ') {
                    $('#ModalSlipOrder #net').val($(this).attr("data-net"));
                    $('#ModalSlipOrder #status').val('รอจัดส่ง');
                    $('#ModalSlipOrder #SaveSlipOrder').val('ยืนยันคำสั่งซื้อ');
                }else if(status == 'รอจัดส่ง'){
                    $('#ModalSlipOrder #status').val('จัดส่งแล้ว');
                    $('#ModalSlipOrder #SaveSlipOrder').val('ยืนยันการจัดส่ง');
                    $('#ModalSlipOrder #data-tracking').html('<div class="input-group-prepend"><span class="input-group-text">เลขพัสดุ</span></div><input type="text" class="form-control is-invalid" id="tracking" name="tracking" required>');
                    $('#ModalSlipOrder #data-shipping').html('<div class="input-group-prepend"><span class="input-group-text">ค่าจัดส่ง</span></div><input type="number" class="form-control is-invalid" id="shipping" name="shipping" required>');
                }else if(status == 'จัดส่งแล้ว'){
                    $('#ModalSlipOrder #status').val('ได้รับสินค้าแล้ว');
                    $('#ModalSlipOrder #SaveSlipOrder').val('ยืนยันการรับสินค้า');
                    $('#ModalSlipOrder #data-consignee').html('<div class="input-group-prepend"><span class="input-group-text">คนรับของ</span></div><input type="text" class="form-control is-invalid" id="consignee" name="consignee" required>');
                }
            });

            $('#dataOrderProduct').on('click', '#OrderProduct', function() {
                $.get("{{ url('product-show') }}" + '/' + $(this).data('id'), function(data) {
                    $('#ModalOrderProduct').modal('show');
                    $('#ModalOrderProduct .modal-title').html('รหัส # '+ data.id + ' : ' + data.title);
                    $('#ModalOrderProduct #productPhoto').attr('src','{{ url('/') }}/storage/'+ data.photo1+'');
                    $('#ModalOrderProduct #product-size').html(data.size);
                    $('#ModalOrderProduct #product-color').html(data.color);
                    $('#ModalOrderProduct #product-price').html(data.price.toFixed(2) + ' บาท');
                    $('#ModalOrderProduct #product-cost').html(data.cost.toFixed(2) + ' บาท');
                    $('#ModalOrderProduct #product-disc').html(data.disc.toFixed(2) + ' บาท');
                    $('#ModalOrderProduct #product-sold').html(data.sold + ' ชิ้น');
                    $('#ModalOrderProduct #product-qty').html(data.qty + ' ชิ้น');
                    $('#ModalOrderProduct #product-vote').html(data.vote + ' คน');
                    $('#ModalOrderProduct #product-score').html(data.score + ' คะแนน');
                    $(function() {
                        var rating = data.rating;
                        function avaliacao(rating) {
                            rating = (Number(rating) * 20);
                            $('.bg-rating').css('width', 0);
                            $('.barra-rating .bg-rating').animate({ width: rating + '%' }, 500);
                        }avaliacao(rating);
                    })
                    $('#ModalOrderProduct #product-content').html(data.content);
                })
            });

            // Modal Show Income Create
            $('#btnAddIncome').on('click', '#addIncome', function() {
                $('#FormIncome')[0].reset();
                $('#ModalIncome').modal('show');
                $('#ModalIncome .modal-title').html('เพิ่มรายการบัญชีร้าน');
                $('#ModalIncome #btnSaveIncome').html('บันทึกข้อมูล');
            });

            // Modal Show Income Edit
            $('#dtatIncome').on('click', '#editIncome', function() {
                //var id = $(this).data('id');
                $('#FormIncome')[0].reset();
                $.get("{{ url('income') }}" + '/' + $(this).data('id') + '/edit', function(data) {
                    $('#ModalIncome').modal('show');
                    $('#ModalIncome .modal-title').html('แก้ไขรายการบัญชีร้าน');
                    $('#ModalIncome #btnSaveIncome').html('แก้ไขข้อมูล');
                    $('#ModalIncome #id').val(data.id);
                    if (data.income < 0) {
                        $('#ModalIncome #income').val(data.income * -1);
                        $('#ModalIncome #remark').val('รายจ่าย');
                    } else {
                        $('#ModalIncome #income').val(data.income);
                        $('#ModalIncome #remark').val('รายรับ');
                    }
                    $('#ModalIncome #refer').val(data.refer);
                })
            });

            // Modal Change Password
            $('#btnSidebar').on('click', '#changePassword', function() {
                $('#FormChangePassword')[0].reset();
                $('#ModalChangePassword').modal('show');
                $('#ModalChangePassword .modal-title').html('เปลี่ยนรหัสผ่าน');
                $('#ModalChangePassword #btnSaveChangePassword').html('บันทึกข้อมูล');
            });

        });
    </script>
</body>

</html>
