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
<!--ユーザー側のログイン、会員登録、管理者画面以外は会員用のヘッダーを読み込む-->
@if (!request()->is(['login', 'member_registration', 'admin/*']))
    @include('common.header')
<!--管理者側のログイン画面以外の管理者画面では管理者用のヘッダーを読み込む-->
@elseif (!request()->is(['admin/login']) && request()->is(['admin/*']))
    @include('common.admin_header')
@endif

@yield('content')
</body>
</html>
