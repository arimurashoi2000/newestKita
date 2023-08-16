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
@auth('members')
    @if (!request()->is(['login', 'member_registration']))
        @include('common.header')
    @endif
@endauth

@auth('admin_users')
    @if (request()->path() === 'admin/login' || request()->is(['login', 'member_registration']))
        {{-- 何も読み込まない --}}
    @elseif (request()->is('admin/*'))
        @include('common.admin_header')
    @else
        @include('common.header')
    @endif
@endauth

@yield('content')
</body>
</html>
