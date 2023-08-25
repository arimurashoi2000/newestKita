@extends('layouts.app')
@section('title')
    <title>会員管理画面</title>
@endsection
@section('content')
    <div class="content-wrapper mt-0 px-5 py-5">
        <h2 class="mt-3">会員管理</h2>
        <div class="justify-content-center" style="--bs-bg-opacity: .1;">
            <!--検索-->
            <div class="card col-md-12 mt-5 px-0">
                {{ Form::open(['route' => 'user.index', 'method' => 'get']) }}
                    <div class="card-body px-4 py-3">
                        <div class="d-flex">
                            <!--ユーザー名-->
                            <div class="col-md-6">
                                <div class="row pt-3">
                                    {{Form::label('name', 'ユーザー名', ['class' => 'col-md-10 col-12 px-0'])}}
                                </div>
                                <div class="row pt-1 col-12 px-0">
                                    {{Form::text('name', request('name'), ['class'=>'form-control border border-secondary mt-2 rounded'])}}
                                </div>
                            </div>

                            <!--メールアドレス-->
                            <div class="col-md-6">
                                <div class="row pt-3">
                                    {{Form::label('email', 'メールアドレス', ['class' => 'col-md-10 col-12 px-0'])}}
                                </div>
                                <div class="row pt-1 col-12 px-0">
                                    {{Form::text('email', request('email'), ['class'=>'form-control border border-secondary mt-2 rounded'])}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--投稿ボタン-->
                    <div class="card-footer d-flex justify-content-center px-0">
                        {{ Form::submit('検索', ['class' => 'btn btn-primary']) }}
                    </div>
                {{ Form::close() }}
            </div>

            <div class="mb-1 mt-3">
                {{ $users->appends(request()->query())->links('common.pagination') }}
            </div>
            <!--一覧-->
            <div class="card mt-3">
                <div class="card-body px-5 py-3">
                    <!--会員一覧-->
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">ユーザー名</th>
                                    <th scope="col">メールアドレス</th>
                                    <th scope="col" class="text-end">登録日時</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td class="text-end">{{$user->created_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
