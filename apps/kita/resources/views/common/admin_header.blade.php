<header>
    <div class ="container-fluid bg-dark sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="{{route('admin_users.index')}}">Kita</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mx-4 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-light mx-3" href="{{ route('admin_users.index') }}">管理者管理</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light mx-3" href="{{ route('user.index') }}">会員管理</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-light mx-3" href="{{ route('article_tags.index') }}">タグ管理</a>
                        </li>
                    </ul>
                    <li class="d-flex ml-auto mx-3">
                        {{ Form::open(['route' => 'admin.logout', 'method' => 'post']) }}
                        @csrf
                        {{Form::submit('ログアウト', ['class'=>'btn btn-outline-light px-4'])}}
                        {{ Form::close() }}
                    </li>
                </div>
            </div>
        </nav>
    </div>
</header>
