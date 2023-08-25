<header>
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
</header>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center" style="text-decoration: none;">
        <span class="brand-text font-weight-light text-white">Kita</span>
    </a>

    <!-- Sidebar -->
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
