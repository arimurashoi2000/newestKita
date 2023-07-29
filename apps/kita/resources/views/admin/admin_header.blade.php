@extends('layouts.app')
@section('header')
    <div id="app">
        <div class="bg-black">
            <div class="container-fluid d-flex mt-0 mx-0 px-0">
                @yield('nav')
            </div>
        </div>
    </div>
    <div class="main">
        @yield('content')
    </div>
@endsection
