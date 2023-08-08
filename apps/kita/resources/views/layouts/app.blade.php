<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
@if((auth()->guard('admin_users')->check() && !Request::is('admin/login')))
    @include('common.admin_header')
@elseif ((Request::is('login') || Request::is('admin/login')) || Request::is('member_registration'))

@else
    @include('common.header')
@endif

@yield('content')
</body>
</html>
