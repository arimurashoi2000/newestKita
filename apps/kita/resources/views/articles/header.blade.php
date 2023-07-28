@extends('layouts.app')
@section('header')
<div id="app">
    <div class="bg-white">
        <div class="container d-flex justify-content-center align-items-center">
            @yield('nav')
        </div>
    </div>
</div>
<div class="main">
    @yield('content')
</div>
@endsection
