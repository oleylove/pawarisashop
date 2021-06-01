@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    รายละเอียดสินค้า รหัส : {{ $product->id }}
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (session('fail'))
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                    @endif

                </div>
                <div class="card-body">

                    <a href="{{ url('/product') }}" title="Back">
                        <button class="btn btn-warning btn-sm mr-2">
                            <i class="fas fa-undo" aria-hidden="true"></i>
                            กลับ
                        </button>
                    </a>
                    <a href="{{ url('/product/' . $product->id . '/edit') }}" title="Edit Product">
                        <button class="btn btn-primary btn-sm mr-2">
                            <i class="far fa-edit" aria-hidden="true"></i>
                            แก้ไข
                        </button>
                    </a>

                    <form method="POST" action="{{ url('product' . '/' . $product->id) }}" accept-charset="UTF-8"
                        style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="photo1" id="photo1" value="{{ $product->photo1}}">
                        <input type="hidden" name="photo2" id="photo2" value="{{ $product->photo2}}">
                        <input type="hidden" name="photo3" id="photo3" value="{{ $product->photo3}}">
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Product"
                            onclick="return confirm(&quot;คุณแน่ใช่ใช่ไหมที่จะลบสินค้ารายการนี้ ? ยืนยัน&quot;)">
                            ยกเลิกขาย
                        </button>
                    </form>
                    <br />
                    <br />
                    <div class="row">
                        <div class="col-md">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <tbody>
                                        <tr>
                                            <th width="150px"> รหัสสินค้า </th>
                                            <td> {{ $product->id }} </td>
                                        </tr>
                                        <tr>
                                            <th> โค้ดสินค้า </th>
                                            <td> {{ $product->code }} </td>
                                        </tr>
                                        <tr>
                                            <th> ชื่อสินค้า </th>
                                            <td> {{ $product->name }} </td>
                                        </tr>
                                        <tr>
                                            <th> ขนาดสินค้า </th>
                                            <td> {{ $product->size }} </td>
                                        </tr>
                                        <tr>
                                            <th> สีสินค้า </th>
                                            <td> {{ $product->color }} </td>
                                        </tr>
                                        <tr>
                                            <th> ราคาขาย </th>
                                            <td> {{ number_format($product->price,2) .' บาท'}} </td>
                                        </tr>
                                        <tr>
                                            <th> ต้นทุน </th>
                                            <td> {{ number_format($product->cost,2) .' บาท' }} </td>
                                        </tr>
                                        <tr>
                                            <th> ส่วนลด </th>
                                            <td> {{ number_format($product->disc,2) .' บาท' }} </td>
                                        </tr>
                                        <tr>
                                            <th> จำนวนสินค้า </th>
                                            <td> {{ $product->qty .' ชิ้น' }} </td>
                                        </tr>
                                        <tr>
                                            <th> ขายไปแล้ว </th>
                                            <td> {{ $product->sold .' ชิ้น'}} </td>
                                        </tr>
                                        <tr>
                                            <th> สินค้ามาแรง </th>
                                            <td>
                                                @if ($product->hot == 1)
                                                แนะนำมาแรง
                                                @else
                                                ไม่แนะนำ
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Vote </th>
                                            <td> {{ $product->vote }} </td>
                                        </tr>
                                        <tr>
                                            <th> Score </th>
                                            <td> {{ $product->score }} </td>
                                        </tr>
                                        <tr>
                                            <th> Rating </th>
                                            <td> {{ $product->rating }} </td>
                                        </tr>
                                        <tr>
                                            <th> เนื้อหาสินค้า </th>
                                            <td> {{ $product->content }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th> รูปสินค้า 1 </th>
                                            <td>
                                                @if(Storage::exists('public/'.$product->photo1))
                                                <img src="{{ url('/') }}/storage/{{ $product->photo1 }}"
                                                    class="rounded-lg border border-success" width="250px">
                                                @else
                                                <img src="{{ url('/') }}/storage/products/404.jpg"
                                                    class="rounded-lg border border-success" width="250px">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> รูปสินค้า 2 </th>
                                            <td>
                                                @if(Storage::exists('public/'.$product->photo2))
                                                <img src="{{ url('/') }}/storage/{{ $product->photo2 }}"
                                                    class="rounded-lg border border-success" width="250px">
                                                @else
                                                <img src="{{ url('/') }}/storage/products/404.jpg"
                                                    class="rounded-lg border border-success" width="250px">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> รูปสินค้า 3 </th>
                                            <td>
                                                @if(Storage::exists('public/'.$product->photo3))
                                                <img src="{{ url('/') }}/storage/{{ $product->photo3 }}"
                                                    class="rounded-lg border border-success" width="250px">
                                                @else
                                                <img src="{{ url('/') }}/storage/products/404.jpg"
                                                    class="rounded-lg border border-success" width="250px">
                                                @endif
                                            </td>
                                        </tr>
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
