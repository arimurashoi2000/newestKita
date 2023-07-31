@extends('layouts.admin_nav')
@section('title')
    <title>管理者登録画面</title>
@endsection
@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <h1>管理者管理 - 編集</h1>
            </div>
        </div>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ Form::open(['route' => ['admin.update', $admin_users->id]]) }}
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-9 col-12">
                <div class="border rounded bg-white py-3">
                    <!--ID-->
                    <div class="col px-4 my-4">
                        <div class="row">
                            {{ Form::label('last_name','姓', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                        </div>
                        <p class="col-auto rounded bg-secondary text-black">{{$admin_users->id}}</p>
                    </div>
                    <!--姓-->
                    <div class="col px-4 my-4">
                        <div class="row">
                            {{ Form::label('last_name','姓', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                            <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::text('last_name', $admin_users->last_name, ['class' => 'form-control', 'id' => 'last_name']) }}
                    </div>
                    <!--名-->
                    <div class="col px-4 my-4">
                        <div class="row">
                            {{ Form::label('first_name','名', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                            <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::text('first_name', $admin_users->first_name, ['class' => 'form-control', 'id' => 'first_name']) }}
                    </div>
                    <!--メールアドレス-->
                    <div class="col px-4 my-4">
                        <div class="row">
                            {{ Form::label('email','メールアドレス', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                            <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::email('email', $admin_users->email, ['class' => 'form-control', 'id' => 'email']) }}
                    </div>
                    <!--パスワード-->
                    <div class="col px-4 my-4">
                        <div class="row">
                            {{ Form::label('password','パスワード', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                        </div>
                        <p class="col-auto rounded text-black">******</p>
                    </div>
                    <!--更新日時-->
                    <div class="col px-4 my-4">
                        <div class="row">
                            {{ Form::label('updated_at','更新日時', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                        </div>
                        <p class="col-auto rounded bg-secondary text-black">{{$admin_users->updated_at}}</p>
                    </div>
                    <!--登録日時-->
                    <div class="col px-4 my-4">
                        <div class="row">
                            {{ Form::label('updated_at','登録日時', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                        </div>
                        <p class="col-auto rounded bg-secondary text-black">{{$admin_users->created_at}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="border rounded bg-white py-3 px-3">
                    <!--更新ボタン-->
                    <div class="col-md-12 col-12 text-center py-2">
                        {{ Form::submit('更新する', ['class' => 'btn btn-primary col-12']) }}
                    </div>

                    <!--削除ボタン-->
                    <div class="col-md-12 col-12 text-center py-2">
                        <a href="#" class="btn btn-danger col-12">削除する</a>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
