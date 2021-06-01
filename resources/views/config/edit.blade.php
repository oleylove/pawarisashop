@extends('layouts.app')

@section('title', 'Pawarisa-Shop | Admin Config Web')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">แก้ไขข้อมูลร้าน</div>
                <div class="card-body">
                    <a href="{{ url('/config') }}" title="Back">
                        <button class="btn btn-warning btn-sm mr-2">
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

                    <form method="POST" action="{{ url('/config/' . $config->id) }}" accept-charset="UTF-8"
                        class="form-horizontal was-validated" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('ชื่อร้าน') ? 'has-error' : ''}}">
                                    <label for="title" class="control-label">{{ 'Title' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="title" type="text" id="title"
                                        value="{{ isset($config->title) ? $config->title : ''}}">
                                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('website') ? 'has-error' : ''}}">
                                    <label for="website" class="control-label">{{ 'Website' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="website" type="text" id="website"
                                        value="{{ isset($config->website) ? $config->website : ''}}">
                                    {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('facebook') ? 'has-error' : ''}}">
                                    <label for="facebook" class="control-label">{{ 'Facebook' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="facebook" type="text" id="facebook"
                                        value="{{ isset($config->facebook) ? $config->facebook : ''}}">
                                    {!! $errors->first('facebook', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('line') ? 'has-error' : ''}}">
                                    <label for="line" class="control-label">{{ 'Line' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="line" type="text" id="line"
                                        value="{{ isset($config->line) ? $config->line : ''}}">
                                    {!! $errors->first('line', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                                    <label for="address" class="control-label">{{ 'ที่อยู่ร้าน' }}</label>
                                    <span class="text-danger"> *</span>
                                    <textarea class="form-control" rows="3" name="address" type="textarea" id="address"
                                        required>{{ isset($config->address) ? $config->address : ''}}</textarea>
                                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
                                    <label for="logo" class="control-label">{{ 'Logo web' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="logo" type="file" id="logo"
                                        value="{{ isset($config->logo) ? $config->logo : ''}}">
                                    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
                                    <input type="hidden" name="logo_old" id="logo_old"
                                        value="{{ isset($config->logo) ? $config->logo : 'logo'}}">
                                    @if(Storage::exists('public/'.$config->logo))
                                    <img src="{{ url('/') }}/storage/{{ $config->logo }}"
                                        class="rounded-lg border border-success mt-1" width="50px">
                                    @else
                                    <img src="{{ url('/') }}/storage/config/404.png"
                                        class="rounded-lg border border-success" width="50px">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                                    <label for="phone" class="control-label">{{ 'เบอร์โทรร้าน' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" type="text" name="phone" id="phone"
                                        pattern="^0([8|9|6])([0-9]{1})-([0-9]{3})-([0-9]{4})"
                                        value="{{ isset($config->phone) ? $config->phone : ''}}"
                                        onkeyup="autoTab(this,2)" placeholder="เบอร์โทร" required>
                                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('bbl_logo') ? 'has-error' : ''}}">
                                    <label for="bbl_logo" class="control-label">{{ 'Logo ธนาคารกรุงเทพ' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="bbl_logo" type="file" id="bbl_logo"
                                        value="{{ isset($config->bbl_logo) ? $config->bbl_logo : ''}}">
                                    {!! $errors->first('bbl_logo', '<p class="help-block">:message</p>') !!}
                                    <input type="hidden" name="bbl_logo_old" id="bbl_logo_old"
                                        value="{{ isset($config->bbl_logo) ? $config->bbl_logo : 'bbl_logo'}}">
                                    @if(Storage::exists('public/'.$config->bbl_logo))
                                    <img src="{{ url('/') }}/storage/{{ $config->bbl_logo }}"
                                        class="rounded-lg border border-success mt-1" width="90px">
                                    @else
                                    <img src="{{ url('/') }}/storage/config/404.png"
                                        class="rounded-lg border border-success" width="90px">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('kbsnk_logo') ? 'has-error' : ''}}">
                                    <label for="kbsnk_logo" class="control-label">{{ 'Logo ธนาคารกสิกรไทย' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="kbsnk_logo" type="file" id="kbsnk_logo"
                                        value="{{ isset($config->kbsnk_logo) ? $config->kbsnk_logo : ''}}">
                                    {!! $errors->first('kbsnk_logo', '<p class="help-block">:message</p>') !!}
                                    <input type="hidden" name="kbsnk_logo_old" id="kbsnk_logo_old"
                                        value="{{ isset($config->kbsnk_logo) ? $config->kbsnk_logo : 'kbsnk_logo'}}">
                                    @if(Storage::exists('public/'.$config->kbsnk_logo))
                                    <img src="{{ url('/') }}/storage/{{ $config->kbsnk_logo }}"
                                        class="rounded-lg border border-success mt-1" width="90px">
                                    @else
                                    <img src="{{ url('/') }}/storage/config/404.png"
                                        class="rounded-lg border border-success" width="90px">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('scb_logo') ? 'has-error' : ''}}">
                                    <label for="scb_logo" class="control-label">{{ 'Logo ธนาคารไทยพาณิชย์' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="scb_logo" type="file" id="scb_logo"
                                        value="{{ isset($config->scb_logo) ? $config->scb_logo : ''}}">
                                    {!! $errors->first('scb_logo', '<p class="help-block">:message</p>') !!}
                                    <input type="hidden" name="scb_logo_old" id="scb_logo_old"
                                        value="{{ isset($config->scb_logo) ? $config->scb_logo : 'scb_logo'}}">
                                    @if(Storage::exists('public/'.$config->scb_logo))
                                    <img src="{{ url('/') }}/storage/{{ $config->scb_logo }}"
                                        class="rounded-lg border border-success mt-1" width="90px">
                                    @else
                                    <img src="{{ url('/') }}/storage/config/404.png"
                                        class="rounded-lg border border-success" width="90px">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('bay_logo') ? 'has-error' : ''}}">
                                    <label for="bay_logo" class="control-label">{{ 'Logo ธนาคารกรุงศรี' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="bay_logo" type="file" id="bay_logo"
                                        value="{{ isset($config->bay_logo) ? $config->bay_logo : ''}}">
                                    {!! $errors->first('bay_logo', '<p class="help-block">:message</p>') !!}
                                    <input type="hidden" name="bay_logo_old" id="bay_logo_old"
                                        value="{{ isset($config->bay_logo) ? $config->bay_logo : 'bay_logo'}}">
                                    @if(Storage::exists('public/'.$config->bay_logo))
                                    <img src="{{ url('/') }}/storage/{{ $config->bay_logo }}"
                                        class="rounded-lg border border-success mt-1" width="90px">
                                    @else
                                    <img src="{{ url('/') }}/storage/config/404.png"
                                        class="rounded-lg border border-success" width="90px">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('bbl') ? 'has-error' : ''}}">
                                    <label for="bbl" class="control-label">{{ 'บัญชีธนาคารกรุงเทพ' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="bbl" type="text" id="bbl"
                                        value="{{ isset($config->bbl) ? $config->bbl : ''}}">
                                    {!! $errors->first('bbl', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('kbsnk') ? 'has-error' : ''}}">
                                    <label for="kbsnk" class="control-label">{{ 'บัญชีกสิกรไทย' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="kbsnk" type="text" id="kbsnk"
                                        value="{{ isset($config->kbsnk) ? $config->kbsnk : ''}}">
                                    {!! $errors->first('kbsnk', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('scb') ? 'has-error' : ''}}">
                                    <label for="scb" class="control-label">{{ 'บัญชีไทยพาณิชย์' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="scb" type="text" id="scb"
                                        value="{{ isset($config->scb) ? $config->scb : ''}}">
                                    {!! $errors->first('scb', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group {{ $errors->has('bay') ? 'has-error' : ''}}">
                                    <label for="bay" class="control-label">{{ 'บัญชีกรุงศรี' }}</label>
                                    <span class="text-danger"> *</span>
                                    <input class="form-control" name="bay" type="text" id="bay"
                                        value="{{ isset($config->bay) ? $config->bay : ''}}">
                                    {!! $errors->first('bay', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="{{ 'Update' }}">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
