@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Product #{{ $product->id }}</div>
                <div class="card-body">
                    <a href="{{ url('/product') }}" title="Back">
                        <button class="btn btn-warning btn-sm">
                            <i class="fas fa-undo" aria-hidden="true"></i>
                            Back</button>
                    </a>
                    <br />
                    <br />

                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ url('/product/' . $product->id) }}" accept-charset="UTF-8"
                        class="form-horizontal was-validated" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
                                    <label for="code" class="control-label">{{ 'โค้ดสินค้า' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="code" type="text" id="code"
                                        value="{{ isset($product->code) ? $product->code : ''}}" required>
                                    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'ชื่อสินค้า' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="name" type="text" id="name"
                                        value="{{ isset($product->name) ? $product->name : ''}}" required>
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group {{ $errors->has('size') ? 'has-error' : ''}}">
                                    <label for="size" class="control-label">{{ 'ขนาด' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="size" type="text" id="size"
                                        value="{{ isset($product->size) ? $product->size : ''}}" required>
                                    {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
                                    <label for="color" class="control-label">{{ 'สี' }}</label>
                                    <input class="form-control" name="color" type="text" id="color"
                                        value="{{ isset($product->color) ? $product->color : ''}}" required>
                                    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group {{ $errors->has('hot') ? 'has-error' : ''}}">
                                    <label for="hot" class="control-label">{{ 'แนะนำ' }}</label>
                                    <select class="form-control" name="hot" id="hot" required>
                                        @if (isset($product->hot))
                                        @switch($product->hot)
                                        @case(0)
                                        <option value="0">ไม่แนะนำ</option>
                                        <option value="1">แนะนำมาแรง</option>
                                        @break
                                        @case(1)
                                        <option value="1">แนะนำมาแรง</option>
                                        <option value="0">ไม่แนะนำ</option>
                                        @break
                                        @endswitch
                                        @else
                                        <option value="">เลือก</option>
                                        <option value="1">แนะนำมาแรง</option>
                                        <option value="0">ไม่แนะนำ</option>
                                        @endif
                                    </select>
                                    {!! $errors->first('hot', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                            <label for="content" class="control-label">{{ 'เนื้อหาสินค้า' }}</label>
                            <span class="text-danger"> *</span>
                            <textarea class="form-control" rows="5" name="content" type="textarea" id="content"
                                required>{{ isset($product->content) ? $product->content : ''}}</textarea>
                            {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                                    <label for="price" class="control-label">{{ 'ราคาขาย' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="price" type="number" id="price"
                                        value="{{ isset($product->price) ? $product->price : ''}}" required>
                                    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('cost') ? 'has-error' : ''}}">
                                    <label for="cost" class="control-label">{{ 'ต้นทุน' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="cost" type="number" id="cost"
                                        value="{{ isset($product->cost) ? $product->cost : ''}}" readonly>
                                    {!! $errors->first('cost', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('disc') ? 'has-error' : ''}}">
                                    <label for="disc" class="control-label">{{ 'ส่วนลด' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="disc" type="number" id="disc"
                                        value="{{ isset($product->disc) ? $product->disc : 0}}" required>
                                    {!! $errors->first('disc', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('qty') ? 'has-error' : ''}}">
                                    <label for="qty" class="control-label">{{ 'จำนวน' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="qty" type="number" id="qty"
                                        value="{{ isset($product->qty) ? $product->qty : 0}}" readonly>
                                    {!! $errors->first('qty', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('photo1') ? 'has-error' : ''}}">
                                    <label for="photo1" class="control-label">{{ 'รูปสินค้า-1' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control mb-1" name="photo1" type="file" id="photo1"
                                        value="{{ isset($product->photo1) ? $product->photo1 : ''}}">
                                    {!! $errors->first('photo1', '<p class="help-block">:message</p>') !!}
                                    <input type="hidden" name="photo1_old" id="photo1_old"
                                        value="{{ isset($product->photo1) ? $product->photo1 : 'photo1'}}">
                                    <div class="text-center">
                                        @if(Storage::exists('public/'.$product->photo1))
                                        <img src="{{ url('/') }}/storage/{{ $product->photo1 }}"
                                            class="rounded-lg border border-success mt-1" width="250px" height="300px">
                                        @else
                                        <img src="{{ url('/') }}/storage/products/404.jpg"
                                            class="rounded-lg border border-success" width="250px" height="300px">
                                        @endif
                                    </div>
                                    <div name="photo1show" id="photo1show"
                                        class="text-center rounded-lg border border-primary mt-1 photo1show">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('photo2') ? 'has-error' : ''}}">
                                    <label for="photo2" class="control-label">{{ 'รูปสินค้า-2' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control mb-1" name="photo2" type="file" id="photo2"
                                        value="{{ isset($product->photo2) ? $product->photo2 : ''}}">
                                    {!! $errors->first('photo2', '<p class="help-block">:message</p>') !!}
                                    <input type="hidden" name="photo2_old" id="photo2_old"
                                        value="{{ isset($product->photo2) ? $product->photo2 : 'photo2'}}">
                                    <div class="text-center">
                                        @if(Storage::exists('public/'.$product->photo2))
                                        <img src="{{ url('/') }}/storage/{{ $product->photo2 }}"
                                            class="rounded-lg border border-success mt-1" width="250px" height="300px">
                                        @else
                                        <img src="{{ url('/') }}/storage/products/404.jpg"
                                            class="rounded-lg border border-success" width="250px" height="300px">
                                        @endif
                                    </div>
                                    <div name="photo2show" id="photo2show"
                                        class="text-center rounded-lg border border-primary mt-1 photo2show">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('photo3') ? 'has-error' : ''}}">
                                    <label for="photo3" class="control-label">{{ 'รูปสินค้า-3' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control mb-1" name="photo3" type="file" id="photo3"
                                        value="{{ isset($product->photo3) ? $product->photo3 : ''}}">
                                    {!! $errors->first('photo3', '<p class="help-block">:message</p>') !!}
                                    <input type="hidden" name="photo3_old" id="photo3_old"
                                        value="{{ isset($product->photo3) ? $product->photo3 : 'photo3'}}">
                                    <div class="text-center">
                                        @if(Storage::exists('public/'.$product->photo3))
                                        <img src="{{ url('/') }}/storage/{{ $product->photo3 }}"
                                            class="rounded-lg border border-success mt-1" width="250px" height="300px">
                                        @else
                                        <img src="{{ url('/') }}/storage/products/404.jpg"
                                            class="rounded-lg border border-success" width="250px" height="300px">
                                        @endif
                                    </div>
                                    <div name="photo3show" id="photo3show"
                                        class="text-center rounded-lg border border-primary mt-1 photo3show">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="แก้ไขข้อมูล">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
