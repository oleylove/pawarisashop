{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}

@extends('layouts.dailyshop')

@section('title','Pawarisa Shop | Error Page')

@section('content')
<section id="aa-error">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-error-area">
                    <h2>404</h2>
                    {{-- <h2>{{ $exception->getMessage() }}</h2> --}}
                    <span>Sorry! Page Not Found</span>
                    <p>Sorry this content has been moved Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Earum, amet perferendis, nemo facere excepturi quis.</p>
                    @auth
                    <a href="{{ url('/home')}}"> Go to Homepage</a>
                    @else
                    <a href="{{ url('/')}}"> Go to Homepage</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
