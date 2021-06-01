@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-10">
            <div class="card">
                <h5 class="card-header">Dashboard Khao Pan-Shop</h5>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md mb-3">
                                <div class="card border-primary">
                                    <h5 class="card-header font-weight-bold">รอตรวจสอบ</h5>
                                    <div class="card-body">
                                        <h5 class="card-title text-center mt-2 mb-4">
                                            <span>
                                                {{ $paid . ' รายการ' }}
                                                @if ($paid > 0)
                                                <div class="spinner-grow text-danger" style="width: 1.5rem; height: 1.5rem;" role="status"></div>
                                                @endif
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="card border-primary">
                                    <h5 class="card-header font-weight-bold">รอจัดส่ง</h5>
                                    <div class="card-body">
                                        <h5 class="card-title text-center mt-2 mb-4">
                                            <span>
                                                {{ $checking . ' รายการ' }}
                                                @if ($checking > 0)
                                                <div class="spinner-grow text-warning" style="width: 1.5rem; height: 1.5rem;" role="status"></div>
                                                @endif
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="card border-primary">
                                    <h5 class="card-header font-weight-bold">จัดส่งแล้ว</h5>
                                    <div class="card-body">
                                        <h5 class="card-title text-center mt-2 mb-4">
                                            <span>
                                                {{ $sent . ' รายการ' }}
                                                @if ($sent > 0)
                                                <div class="spinner-grow text-info" style="width: 1.5rem; height: 1.5rem;" role="status"></div>
                                                @endif
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="card border-primary">
                                    <h5 class="card-header font-weight-bold">ได้รับแล้ว</h5>
                                    <div class="card-body">
                                        <h5 class="card-title text-center mt-2 mb-4">
                                            <span>{{ $completed . ' รายการ'}}</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="card border-primary">
                                    <h5 class="card-header font-weight-bold">ยกเลิก</h5>
                                    <div class="card-body">
                                        <h5 class="card-title text-center mt-2 mb-4">
                                            <span>{{ $cancelled . ' รายการ' }}</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md mb-3">
                                <div class="card border-primary">
                                    <h5 class="card-header font-weight-bold">คำสั่งซื้อทั้งหมด</h5>
                                    <div class="card-body">
                                        <h5 class="card-title text-center mt-2 mb-4">
                                            <span>{{ $orders->count() . ' รายการ' }}</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="card border-primary">
                                    <h5 class="card-header font-weight-bold">ลูกค้า</h5>
                                    <div class="card-body">
                                        <h5 class="card-title text-center mt-2 mb-4">
                                            <span>{{ $users->count() .' คน'}}</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="card border-primary">
                                    <h5 class="card-header font-weight-bold">สินค้าทั้งหมด</h5>
                                    <div class="card-body">
                                        <h5 class="card-title text-center mt-2 mb-4">
                                            <span>{{$products->count() . ' รายการ' }}</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="card border-primary">
                                    <h5 class="card-header font-weight-bold">รายรับ</h5>
                                    <div class="card-body">
                                        <h5 class="card-title text-center mt-2 mb-4">
                                            <span>{{ number_format($revenue,2) . ' บาท' }}</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <div class="card border-primary">
                                    <h5 class="card-header font-weight-bold">รายจ่าย</h5>
                                    <div class="card-body">
                                        <h5 class="card-title text-center mt-2 mb-4">
                                            <span>{{ number_format($expenditure,2) . ' บาท' }}</span>
                                        </h5>
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
@endsection
