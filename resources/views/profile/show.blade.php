@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">ที่อยู่สำหรับจัดส่งของลูกค้ารหัส # {{ $users->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/profile') }}" title="Back">
                        <button class="btn btn-warning btn-sm">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Back
                        </button>
                    </a>
                    <br><br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <th> ชื่อลูกค้า </th>
                                            <td> {{ $users->name }} </td>
                                        </tr>
                                        <tr>
                                            <th> อีเมลล์ </th>
                                            <td> {{ $users->email }} </td>
                                        </tr>
                                        <tr>
                                            <th> วันที่สมัคร </th>
                                            <td> {{ $users->created_at }} </td>
                                        </tr>
                                        <tr>
                                            <th> คำสั่งซื้อ </th>
                                            <td> {{ $users->orders->count().' ครั้ง'}} </td>
                                        </tr>
                                        <tr>
                                            <th> โหวต </th>
                                            <td> {{ $users->votes->count().' ครั้ง'}} </td>
                                        </tr>
                                        <tr>
                                            <th> รีวิวสินค้า </th>
                                            <td> {{ $users->reviews->count().' ครั้ง'}} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($profile as $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $item->name}}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->address }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
