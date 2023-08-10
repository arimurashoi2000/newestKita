@extends('layouts.app')
@section('title')
    <title>管理者画面</title>
@endsection
@section('content')
    <div class="container mt-0">
        <h2 class="mt-3">管理者管理</h2>
            <div class="justify-content-center" style="--bs-bg-opacity: .1;">
                 <!--検索-->
                <div class="card col-md-12 mt-5">
                    <div class="card-body px-4 py-3">
                        {{ Form::open(['route' => 'admin_users.index', 'method' => 'get']) }}
                        @csrf
                            <div class="d-flex">
                                <!--姓-->
                                <div class="col-md-4">
                                    <div class="row pt-3">
                                        {{Form::label('last_name', '姓', ['class' => 'col-md-10 col-12 px-0'])}}
                                    </div>
                                    <div class="row pt-1">
                                        {{Form::text('last_name', null, ['class'=>'title col-md-10 col-12 border border-success mt-2 rounded'])}}
                                    </div>
                                </div>
                                <!--名-->
                                <div class="col-md-4">
                                    <div class="row pt-3">
                                        {{Form::label('first_name', '名', ['class' => 'col-md-10 col-12 px-0'])}}
                                    </div>
                                    <div class="row pt-1">
                                        {{Form::text('first_name', null, ['class'=>'title col-md-10 col-12 border border-success mt-2 rounded'])}}
                                    </div>
                                </div>
                                <!--メールアドレス-->
                                <div class="col-md-4">
                                    <div class="row pt-3">
                                        {{Form::label('email', 'メールアドレス', ['class' => 'col-md-10 col-12 px-0'])}}
                                    </div>
                                    <div class="row pt-1">
                                        {{Form::text('email', null, ['class'=>'title col-md-10 col-12 border border-success mt-2 rounded'])}}
                                    </div>
                                </div>
                            </div>

                            <!--投稿ボタン-->
                            <div class="row">
                                <div class="d-flex justify-content-center col-md-12 col-12 px-0 ">
                                    {{Form::submit('検索', ['class'=>'submit_button btn btn-primary text-white my-3 rounded btn-lg'])}}
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <!--一覧-->
                <div class="card mt-5">
                    <div class="card-body px-5 py-3">
                        <!--TODO　新規登録ボタン-->

                        <!--管理者一覧-->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">メールアドレス</th>
                                    <th scope="col">変更日時</th>
                                    <th scope="col">登録日時</th>
                                    <th scope="col">レコード操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admin_users as $admin_user)
                                    <tr>
                                        <th scope="row">{{$admin_user->id}}</th>
                                        <td>{{$admin_user->last_name}}{{$admin_user->first_name}}</td>
                                        <td>{{$admin_user->updated_at}}</td>
                                        <td>{{$admin_user->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin_users.edit', $admin_user->id)}}" class="btn btn-primary text-white">編集</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
@endsection
