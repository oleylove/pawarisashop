@extends('layouts.dailyshop')

@section('title','Pawarisa Shop | My Account')

@section('content')

<!-- Cart view section -->
<section id="checkout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="checkout-area">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="checkout-left">
                                <div class="panel-group" id="accordion">
                                    <!-- Billing Details -->
                                    <div class="panel panel-default aa-checkout-billaddress">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseThree">
                                                    เพิ่มที่อยู่ในการจัดส่งสินค้า
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
                                            <form method="POST" action="{{ url('myaccount-create') }}"
                                                accept-charset="UTF-8" class="form-horizontal"
                                                enctype="multipart/form-data" id="formMyAccount">
                                                {{ csrf_field() }}
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="aa-checkout-single-bill">
                                                                <input type="hidden" name="id" id="id">
                                                                <input type="text" name="name" id="name"
                                                                    placeholder="ชื่อ - นามสกุล">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="aa-checkout-single-bill">
                                                                <input type="text" name="phone" id="phone"
                                                                    pattern="^0([8|9|6])([0-9]{1})-([0-9]{3})-([0-9]{4})"
                                                                    onkeyup="autoTab(this,2)" placeholder="เบอร์โทร">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="aa-checkout-single-bill">
                                                                <textarea cols="8" rows="3" name="address" id="address"
                                                                    placeholder="ที่อยู่ในการจัดส่งสินค้า"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="aa-checkout-single-bill">
                                                                <input type="submit" id="btnMyAccount"
                                                                    class="aa-browse-btn" value="บันทึกข้อมูล">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="panel panel-default aa-checkout-billaddress">

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
                                        @endif

                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion"
                                                    href="#changpassword">
                                                    เปลี่ยนรหัสผ่าน
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="changpassword" class="panel-collapse collapse">
                                            <form method="POST" action="{{ route('change.password') }}"
                                                accept-charset="UTF-8" class="form-horizontal"
                                                enctype="multipart/form-data">
                                                {{ method_field('PATCH') }}
                                                {{ csrf_field() }}
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="aa-checkout-single-bill">
                                                                <input id="password" type="password"
                                                                    class="form-control" name="current_password"
                                                                    autocomplete="current-password"
                                                                    placeholder="รหัสผ่านเดิม">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="aa-checkout-single-bill">
                                                                <input id="new_password" type="password"
                                                                    class="form-control" name="new_password"
                                                                    autocomplete="current-password"
                                                                    placeholder="รหัสผ่านใหม่">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="aa-checkout-single-bill">
                                                                <input id="new_confirm_password" type="password"
                                                                    class="form-control" name="new_confirm_password"
                                                                    autocomplete="current-password"
                                                                    placeholder="ยืนยันรหัสผ่านใหม่">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="aa-checkout-single-bill">
                                                                <input type="submit" id="btnChangePassword"
                                                                    class="aa-browse-btn" value="เปลี่ยนรหัสผ่าน">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="checkout-right">
                                @foreach ($profile as $item)
                                @if ($item->status == 'จัดส่ง')
                                <h4>ที่อยู่สำหรับจัดส่งสินค้า # {{ $loop->iteration }} </h4>
                                @else
                                <h4>ที่อยู่ # {{ $loop->iteration }} </h4>
                                @endif
                                <div class="aa-payment-method">
                                    <label>ชื่อ-สกุล : {{ $item->name }}</label>
                                    <label>เบอร์โทร : {{ $item->phone }}</label>
                                    <label>ที่อยู่ : {{ $item->address }}</label>
                                    <form method="POST" action="{{ url('myaccount-update/'.$item->id) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('PATCH') }}
                                        {{ csrf_field() }}
                                        <input type="hidden" name="status" id="status" value="จัดส่ง">
                                        <input type="submit" value="ที่อยู่จัดส่ง" class="aa-browse-btn" title="Change"
                                            onclick="return confirm(&quot;คุณต้องการเปลี่ยนที่อยู่นี้ เป็นที่อยู่ในการจัดสังสินค้า ใช่หรือไม่?&quot;)">
                                    </form>

                                    <input type="submit" data-toggle="collapse" data-id="{{ $item->id }}" title="Edit"
                                        class="aa-browse-btn" id="editMyAccount" data-parent="#accordion"
                                        href="#collapseThree" value="แก้ไข">

                                    <form method="POST" action="{{ url('myaccount-delete/'.$item->id) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <input type="submit" value="ลบ" class="aa-browse-btn" title="Delete"
                                            onclick="return confirm(&quot;Confirm Delete?&quot;)">
                                    </form>
                                </div>
                                <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Cart view section -->

@endsection
