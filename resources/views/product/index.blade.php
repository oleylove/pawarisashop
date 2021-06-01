@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    รายการสินค้าทั้งหมด {{ $productCount }} รายาร
                </div>
                <div class="card-body">
                    <a href="{{ url('/product/create') }}" class="btn btn-success btn-sm mr-2">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        เพิ่มสินค้าใหม่
                    </a>
                    <a href="{{ url('/product?search=สินค้าใกล้หมด') }}" class="btn btn-primary btn-sm mr-2">
                        สินค้าใกล้หมด
                    </a>
                    <a href="{{ url('/product?search=สินค้าลดราคา') }}" class="btn btn-warning btn-sm mr-2">
                        สินค้าลดราคา
                    </a>
                    <a href="{{ url('/product?search=สินค้ายกเลิกขาย') }}" class="btn btn-danger btn-sm mr-2">
                        สินค้ายกเลิกขาย
                    </a>
                    <a href="{{ url('/product') }}" class="btn btn-info btn-sm mr-2">
                        ทั้งหมด
                    </a>

                    <form method="GET" action="{{ url('/product') }}" accept-charset="UTF-8"
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

                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" id="dataProd">
                            <thead>
                                <tr class="text-center">
                                    {{-- <th>No.</th> --}}
                                    <th>รหัสสินค้า</th>
                                    <th>โค้ดสินค้า</th>
                                    <th class="text-left">ชื่อสินค้า</th>
                                    <th>ต้นทุน</th>
                                    <th>ราคาขาย</th>
                                    <th>ส่วนลด</th>
                                    <th>รูป-1</th>
                                    <th>รูป-2</th>
                                    <th>รูป-3</th>
                                    <th>จำนวน</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $item)
                                <tr class="text-center">
                                    {{-- <td>
                                        {{ ($product->currentpage()-1) * $product->perpage() + $loop->index + 1 }}
                                    </td> --}}
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td class="text-left">{{ $item->name }}</td>
                                    <td>{{ number_format($item->cost,2) }}</td>
                                    <td>{{ number_format($item->price,2) }}</td>
                                    <td>{{ number_format($item->disc,2) }}</td>
                                    <td>
                                        @if(Storage::exists('public/'.$item->photo1))
                                        <a href="javascript:void(0)" id="photoProd" data-img="{{ $item->photo1 }}"
                                            data-title="รูปสินค้า-1">
                                            <img src="{{ url('/') }}/storage/{{ $item->photo1 }}" width="30px"
                                                height="35px" class="rounded-lg border border-success">
                                        </a>
                                        @else
                                        <img src="{{ url('/') }}/storage/products/404.jpg" width="30px" height="35px">
                                        @endif
                                    </td>
                                    <td>
                                        @if(Storage::exists('public/'.$item->photo2))
                                        <a href="javascript:void(0)" id="photoProd" data-img="{{ $item->photo2 }}"
                                            data-title="รูปสินค้า-2">
                                            <img src="{{ url('/') }}/storage/{{ $item->photo2 }}" width="30px"
                                                height="35px" class="rounded-lg border border-success">
                                        </a>
                                        @else
                                        <img src="{{ url('/') }}/storage/products/404.jpg" width="30px" height="35px">
                                        @endif
                                    </td>
                                    <td>
                                        @if(Storage::exists('public/'.$item->photo3))
                                        <a href="javascript:void(0)" id="photoProd" data-img="{{ $item->photo3 }}"
                                            data-title="รูปสินค้า-3">
                                            <img src="{{ url('/') }}/storage/{{ $item->photo3 }}" width="30px"
                                                height="35px" class="rounded-lg border border-success">
                                        </a>
                                        @else
                                        <img src="{{ url('/') }}/storage/products/404.jpg" width="30px" height="35px">
                                        @endif
                                    </td>
                                    <td>{{ $item->qty }}</td>
                                    <td>
                                        <a href="{{ url('/product/' . $item->id) }}" title="View Product">
                                            <button class="btn btn-info btn-sm">
                                                ดูสินค้า
                                            </button>
                                        </a>
                                        <a href="{{ url('/product/' . $item->id . '/edit') }}"
                                            title="Edit Product"><button class="btn btn-warning btn-sm">
                                                แก้ไข
                                            </button>
                                        </a>

                                        <form method="POST" action="{{ url('/product' . '/' . $item->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}

                                            @if ($item->status == 'ขาย')
                                            <input class="d-none" type="hidden" name="status" id="status"
                                                value="ยกเลิกขาย">
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Product"
                                                onclick="return confirm(&quot;คุณแน่ใช่ใช่ไหมที่จะยกขายสินค้ารายการนี้ ? ยืนยัน&quot;)">
                                                ยกเลิกขาย
                                            </button>
                                            @else
                                            <input class="d-none" type="hidden" name="status" id="status" value="ขาย">
                                            <button type="submit" class="btn btn-success btn-sm" title="Delete Product"
                                                onclick="return confirm(&quot;คุณแน่ใช่ใช่ไหมที่จะกลับมาขายสินค้ารายการนี้ ? ยืนยัน&quot;)">
                                                กลับมาขาย
                                            </button>
                                            @endif

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper float-right">
                            {!! $product->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Photo Product-->
<div class="modal fade" id="ModalPhotoProd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <!-- Message title-->
                </h5>
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="PhotoProduct" class="img-fluid rounded-lg border border-success" width="350px" src="">
                <!-- Photo Product-->
            </div>
        </div>
    </div>
</div>

@endsection
