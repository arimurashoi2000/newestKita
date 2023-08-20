<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
@if(Auth::guard('members')->check() && Auth::guard('admin_users')->check())
    @if (!request()->is(['login', 'member_registration', 'admin/*']))
        @include('common.header')
    @elseif (!request()->is(['admin/login']) && request()->is(['admin/*']))
        @include('common.admin_header')
    @else

    @endif
@elseif(!Auth::guard('members')->check() && !Auth::guard('admin_users')->check())
    @if (!request()->is(['login', 'member_registration', 'admin/*']))
        @include('common.header')
    @elseif (!request()->is(['admin/login']) && request()->is(['admin/*']))
        @include('common.admin_header')
    @else

    @endif
@elseif(Auth::guard('members')->check() && !Auth::guard('admin_users')->check())
    @if (!request()->is(['login', 'member_registration', 'admin/*']))
        @include('common.header')
    @elseif (!request()->is(['admin/login']) && request()->is(['admin/*']))
        @include('common.admin_header')
    @else

    @endif
@elseif(!Auth::guard('members')->check() && Auth::guard('admin_users')->check())
    @if (!request()->is(['login', 'member_registration', 'admin/*']))
        @include('common.header')
    @elseif (!request()->is(['admin/login']) && request()->is(['admin/*']))
        @include('common.admin_header')
    @else

    @endif
@endif

@yield('content')
</body>
</html>
