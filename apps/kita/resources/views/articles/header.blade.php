<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー画面</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
<div id="app">
    <div class="bg-white">
        <div class="container d-flex justify-content-center align-items-center" style="height: 120px;">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a href="{{route('articles.index')}}" class="btn btn-success rounded-circle me-3" style="font-size: 2rem; padding: 0.5rem 2rem;">Kita</a>

                    <form class="d-flex">
                        <div class="col-md-9">
                            <input class="form-control form-control-lg me-2 border border-success" type="search" placeholder="Search for something" aria-label="Search">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-success btn-lg mr-2" type="submit">検索</button>
                        </div>

                    </form>

                    <div class="ml-2">
                        <div class="col-auto">
                            <button class="btn btn-outline-success btn-lg pl-2"><span style="color: black;">記事を作成する</span></button>
                        </div>
                    </div>

                    <div class>
                        <div class="col-10 float-end">
                            <button class="btn btn-success btn-lg dropdown-toggle dropdown-toggle-no-caret" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="main">
                        @yield('content')
                    </div>
                </div>
            </nav>
        </div>
    </div>

</div>
</body>
</html>
