<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<div class="container py-5">
    <div class="d-flex align-items-center justify-content-center bg-secondary" style="--bs-bg-opacity: .1 height: 100vh;">
        <div class="col-md-8 col-10 bg-white text-dark">
            <div class="card">
                <div class="card-body px-5 py-3">

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    {{ Form::open(['route' => ['update', $article->id]]) }}
                    @csrf
                    <!--タイトル-->
                    <div class="row pt-3">
                        {{Form::label('title', 'タイトル', ['class' => 'col-md-12 col-12 px-0'])}}
                    </div>
                    <div class="row pt-3">
                        {{Form::text('title', $article->title, ['class'=>'title col-md-12 col-12 border border-success mt-2 rounded'])}}
                    </div>
                    <!--タグ-->
                    <div class="row">
                        <div class="col-md-12 col-12"></div>
                    </div>
                    <!--記事内容-->
                    <div class="row pt-3">
                        {{Form::label('contents', '記事内容', ['class'=>'col-md-12 col-12 px-0 '])}}
                    </div>
                    <div class="row">
                        {{Form::textarea('contents', $article->contents, ['class'=>'contents col-md-12 col-12 border border-success mt-2 rounded', 'style' => 'height: 400px;'])}}
                    </div>
                    <!--投稿ボタン-->
                    <div class="row">
                        <div class="col-md-12 col-12 text-md-end px-0">
                            {{Form::submit('保存する', ['class'=>'submit_button btn btn-success my-3 rounded'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

