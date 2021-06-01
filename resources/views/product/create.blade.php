@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">เพิ่มสินค้าใหม่ กรุณาใส่รายละเอียดสินค้าให้ถูกต้องและครบถ้วน</div>
                <div class="card-body">
                    <a href="{{ url('/product') }}" title="Back">
                        <button class="btn btn-warning btn-sm">
                            <i class="fas fa-undo" aria-hidden="true"></i>
                            Back
                        </button>
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

                    <form method="POST" action="{{ url('/product') }}" accept-charset="UTF-8"
                        class="form-horizontal was-validated" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
                                    <label for="code" class="control-label">{{ 'ชื่อสินค้า' }}</label>
                                    <input class="form-control" name="code" type="text" id="code" required>
                                    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'ชื่อสินค้า' }}</label>
                                    <input class="form-control" name="name" type="text" id="name" required>
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group {{ $errors->has('size') ? 'has-error' : ''}}">
                                    <label for="size" class="control-label">{{ 'ขนาด' }}</label>
                                    <input class="form-control" name="size" type="text" id="size" required>
                                    {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
                                    <label for="color" class="control-label">{{ 'สี' }}</label>
                                    <input class="form-control" name="color" type="text" id="color" required>
                                    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group {{ $errors->has('hot') ? 'has-error' : ''}}">
                                    <label for="hot" class="control-label">{{ 'แนะนำ' }}</label>
                                    <select class="form-control" name="hot" id="hot" required>
                                        <option value="">เลือก</option>
                                        <option value="1">แนะนำมาแรง</option>
                                        <option value="0">ไม่แนะนำ</option>
                                    </select>
                                    {!! $errors->first('hot', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                            <label for="content" class="control-label">{{ 'เนื้อหาสินค้า' }}</label>
                            <textarea class="form-control" rows="5" name="content" type="textarea" id="content"
                                required></textarea>
                            {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                                    <label for="price" class="control-label">{{ 'ราคาขาย' }}</label>
                                    <input class="form-control" name="price" type="number" id="price" min="1" required>
                                    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('cost') ? 'has-error' : ''}}">
                                    <label for="cost" class="control-label">{{ 'ต้นทุน' }}</label>
                                    <input class="form-control" name="cost" type="number" id="cost" min="1" required>
                                    {!! $errors->first('cost', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('disc') ? 'has-error' : ''}}">
                                    <label for="disc" class="control-label">{{ 'ส่วนลด' }}</label>
                                    <input class="form-control" name="disc" type="number" id="disc" min="1" required>
                                    {!! $errors->first('disc', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('qty') ? 'has-error' : ''}}">
                                    <label for="qty" class="control-label">{{ 'จำนวน' }}</label>
                                    <input class="form-control" name="qty" type="number" id="qty" min="1" required>
                                    {!! $errors->first('qty', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('photo1') ? 'has-error' : ''}}">
                                    <label for="photo1" class="control-label">{{ 'รปู-1' }}</label>
                                    <input class="form-control" name="photo1" type="file" id="photo1" required>
                                    {!! $errors->first('photo1', '<p class="help-block">:message</p>') !!}
                                    <div name="photo1show" id="photo1show"
                                        class="text-center rounded-lg border border-success mt-1 photo1show">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('photo2') ? 'has-error' : ''}}">
                                    <label for="photo2" class="control-label">{{ 'รปู-2' }}</label>
                                    <input class="form-control" name="photo2" type="file" id="photo2">
                                    {!! $errors->first('photo2', '<p class="help-block">:message</p>') !!}
                                    <div name="photo2show" id="photo2show"
                                        class="text-center rounded-lg border border-success mt-1 photo2show">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('photo3') ? 'has-error' : ''}}">
                                    <label for="photo3" class="control-label">{{ 'รปู-3' }}</label>
                                    <input class="form-control" name="photo3" type="file" id="photo3">
                                    {!! $errors->first('photo3', '<p class="help-block">:message</p>') !!}
                                    <div name="photo3show" id="photo3show"
                                        class="text-center rounded-lg border border-success mt-1 photo3show">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="บันทึกข้อมูล">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
