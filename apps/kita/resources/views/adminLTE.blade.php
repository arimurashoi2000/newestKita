<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body class="sidebar-mini layout-fixed sidebar-collapse" style="height: auto;">
<div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60" style="display: none;">
    </div>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

    </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link text-center" style="text-decoration: none;">
            <span class="brand-text font-weight-light text-white">Kita</span>
        </a>

        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-header text-white">MENU</li>
                    <li class="nav-item">
                        <a href="{{ route('admin_users.index') }}" class="nav-link text-white">
                            <i class="nav-icon fa-solid fa-users-gear"></i>
                            <p>管理者管理</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link text-white">
                            <i class="nav-icon fa-solid fa-users-line"></i>
                            <p>会員管理</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('article_tags.index') }}" class="nav-link text-white">
                            <i class="nav-icon fa-solid fa-tags"></i>
                            <p>タグ管理</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        {!! Form::open(['route' => 'admin.logout', 'method' => 'POST']) !!}
                        {!! csrf_field() !!}
                        <button type="submit" class="btn-link nav-link text-white" style="text-align: left;">
                            <i class="nav-icon fa-solid fa-arrow-right-from-bracket"></i>
                            <p>ログアウト</p>
                        </button>
                        {!! Form::close() !!}
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
</body>
</html>
