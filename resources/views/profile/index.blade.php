@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md">
                            รายซื่อสมาชิกทั้งหมด
                        </div>
                        <div class="col-md">
                            <form method="GET" action="{{ url('/profile') }}" accept-charset="UTF-8"
                                class="form-inline my-2 my-lg-0 float-right" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..."
                                        value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>วันสมัคร</th>
                                    <th>ชื่อ</th>
                                    <th>อีเมลล์</th>
                                    <th class="text-center">คำสั่งซื่อสินค้า</th>
                                    <th class="text-center">โหวตสินค้า</th>
                                    <th class="text-center">รีวิวสินค้า</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $item)
                                <tr>
                                    <td class="text-center">
                                        {{ ($users ->currentpage()-1) * $users ->perpage() + $loop->index + 1 }}
                                    </td>
                                    <td>{{ get_dmY($item->created_at) }}</td>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="text-center">{{ $item->orders->count() .' ครั้ง'}}</td>
                                    <td class="text-center">{{ $item->votes->count() .' ครั้ง'}}</td>
                                    <td class="text-center">{{ $item->reviews->count() .' ครั้ง'}}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/profile/' . $item->id) }}" title="View Profile"><button
                                                class="btn btn-info btn-sm">
                                                View
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper">
                            {!! $users->appends(['search' => Request::get('search')])->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
