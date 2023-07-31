@extends('layouts.admin_nav')
@section('title')
    <title>会員管理画面</title>
@endsection
@section('content')
    <div class="container mt-0">
        <h2 class="mt-3">会員管理</h2>
        <div class="justify-content-center" style="--bs-bg-opacity: .1;">
            <!--検索-->
            <div class="card col-md-12 mt-5">
                <div class="card-body px-4 py-3">
                    {{ Form::open(['route' => 'user.index', 'method' => 'get']) }}
                    @csrf
                    <div class="d-flex">
                        <!--ユーザー名-->
                        <div class="col-md-6">
                            <div class="row pt-3">
                                {{Form::label('name', 'ユーザー名', ['class' => 'col-md-10 col-12 px-0'])}}
                            </div>
                            <div class="row pt-1">
                                {{Form::text('name', null, ['class'=>'title col-md-10 col-12 border border-success mt-2 rounded'])}}
                            </div>
                        </div>

                        <!--メールアドレス-->
                        <div class="col-md-6">
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

            <div class="mb-1 mt-3">
                <p>{{ $users->links() }}</p>
            </div>
            <!--一覧-->
            <div class="card mt-3">
                <div class="card-body px-5 py-3">
                    <!--会員一覧-->
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ユーザー名</th>
                            <th scope="col">メールアドレス</th>
                            <th scope="col">登録日時</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
