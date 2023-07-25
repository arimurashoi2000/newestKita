<head>
    <title>プロフィール編集ページ</title>
</head>

@extends('articles.header')
@section('content')
    <div class="container py-5">
        <div class="d-flex align-items-center justify-content-center bg-secondary" style="--bs-bg-opacity: .1 height: 100vh;">
            <div class="col-md-8 col-10 bg-white text-dark">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body px-5 py-3">
                        <div class="row pt-3">
                            <h2 class="col-md-12 col-12 border-bottom border-dark py-2">プロフィール編集</h2>
                        </div>
                        {{ Form::open(['route' => 'profile.update']) }}
                        @csrf
                        <!--タイトル-->
                        <div class="row pt-3">
                            {{Form::label('name', 'ユーザー名', ['class' => 'col-md-12 col-12 px-0'])}}
                        </div>
                        <div class="row pt-1">
                            {{Form::text('name', null, ['class'=>'title col-md-12 col-12 border border-success mt-2 rounded'])}}
                        </div>
                        <!--メールアドレス-->
                        <div class="row pt-3">
                            {{Form::label('email', 'メールアドレス', ['class' => 'col-md-12 col-12 px-0'])}}
                        </div>
                        <div class="row pt-1">
                            {{Form::text('email', null, ['class'=>'title col-md-12 col-12 border border-success mt-2 rounded'])}}
                        </div>
                        <!--パスワード-->
                        <div class="row pt-3 ml-0">
                            {{Form::label('password', 'パスワード', ['class' => 'col-md-12 col-12 px-0'])}}
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-2 px-0">
                                <p>*****</p>
                            </div>
                            <div class="col-md-3 px-0">
                                <!--パスワード変更機能時に実装-->
                                <a href="#" class="btn btn-success rounded-pill">パスワードを変更する</a>
                            </div>
                        </div>
                        <!--投稿ボタン-->
                        <div class="row">
                            <div class="col-md-12 col-12 text-md-end px-0">
                                {{Form::submit('更新する', ['class'=>'submit_button btn btn-success my-3 rounded-pill'])}}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
