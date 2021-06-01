@extends('layouts.app')

@section('title', 'Pawarisa-Shop | Admin Config Web')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">ข้อมูลร้าน</div>
                <div class="card-body">
                    <a href="{{ url('/config/' . $config->id . '/edit') }}" title="Edit config">
                        <button class="btn btn-primary btn-sm mr-2">
                            <i class="far fa-edit" aria-hidden="true"></i>
                            Edit
                        </button>
                    </a>
                    <br />
                    <br />
                    <div class="row">
                        <div class="col-md">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th width="150px"> ชื่อร้าน </th>
                                            <td> {{ $config->title }} </td>
                                        </tr>
                                        <tr>
                                            <th> Facebook </th>
                                            <td> {{ $config->facebook }} </td>
                                        </tr>
                                        <tr>
                                            <th> เบอร์โทรร้าน </th>
                                            <td> {{ $config->phone }} </td>
                                        </tr>
                                        <tr>
                                            <th> ฟรีจัดส่ง </th>
                                            <td> {{ 'เมื้อซื้อครบ ' . number_format($config->freeshipping,2) . ' บาท' }} </td>
                                        </tr>
                                        <tr>
                                            <th> ที่อยู่ร้าน </th>
                                            <td> {{ $config->address }} </td>
                                        </tr>
                                        <tr>
                                            <th> บัญชีธนาคารกรุงเทพ </th>
                                            <td> {{ $config->bbl }} </td>
                                        </tr>
                                        <tr>
                                            <th> บัญชีธนาคารกสิกรไทย </th>
                                            <td> {{ $config->kbsnk }} </td>
                                        </tr>
                                        <tr>
                                            <th> บัญชีธนาคารไทยพาณิชย์ </th>
                                            <td> {{ $config->scb }} </td>
                                        </tr>
                                        <tr>
                                            <th> บัญชีธนาคารกรุงศรี </th>
                                            <td> {{ $config->bay }} </td>
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
                                            <th width="150px"> Website </th>
                                            <td> {{ $config->website }} </td>
                                        </tr>
                                        <tr>
                                            <th> Line </th>
                                            <td> {{ $config->line }} </td>
                                        </tr>
                                        <tr>
                                            <th> ค่าจัดส่ง </th>
                                            <td> {{ number_format($config->shipping,2) . ' บาท' }} </td>
                                        </tr>
                                        <tr>
                                            <th> Logo ร้าน</th>
                                            <td>
                                                @if(Storage::exists('public/'.$config->logo))
                                                <img src="{{ url('/') }}/storage/{{ $config->logo }}"
                                                    class="rounded-lg border border-success" width="50px">
                                                @else
                                                <img src="{{ url('/') }}/storage/config/404.png"
                                                    class="rounded-lg border border-success" width="50px">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Logo ธนาคารกรุงเทพ </th>
                                            <td>
                                                @if(Storage::exists('public/'.$config->bbl_logo))
                                                <img src="{{ url('/') }}/storage/{{ $config->bbl_logo }}"
                                                    class="rounded-lg border border-success" width="50px">
                                                @else
                                                <img src="{{ url('/') }}/storage/config/404.png"
                                                    class="rounded-lg border border-success" width="50px">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Logo ธนาคารกสิกรไทย </th>
                                            <td>
                                                @if(Storage::exists('public/'.$config->kbsnk_logo))
                                                <img src="{{ url('/') }}/storage/{{ $config->kbsnk_logo }}"
                                                    class="rounded-lg border border-success" width="50px">
                                                @else
                                                <img src="{{ url('/') }}/storage/config/404.png"
                                                    class="rounded-lg border border-success" width="50px">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Logo ธนาคารไทยพาณิชย์ </th>
                                            <td>
                                                @if(Storage::exists('public/'.$config->scb_logo))
                                                <img src="{{ url('/') }}/storage/{{ $config->scb_logo }}"
                                                    class="rounded-lg border border-success" width="50px">
                                                @else
                                                <img src="{{ url('/') }}/storage/config/404.png"
                                                    class="rounded-lg border border-success" width="50px">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Logo ธนาคารกรุงศรี</th>
                                            <td>
                                                @if(Storage::exists('public/'.$config->bay_logo))
                                                <img src="{{ url('/') }}/storage/{{ $config->bay_logo }}"
                                                    class="rounded-lg border border-success" width="50px">
                                                @else
                                                <img src="{{ url('/') }}/storage/config/404.png"
                                                    class="rounded-lg border border-success" width="50px">
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
