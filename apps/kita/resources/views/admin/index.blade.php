@extends('layouts.app')
@section('title')
    <title>管理者画面</title>
@endsection
@section('content')
    <div class="container mt-0">
        <h2 class="mt-3">管理者管理</h2>
            <div class="justify-content-center" style="--bs-bg-opacity: .1;">
                @include('common.flash_message')
                 <!--検索-->
                <div class="card col-md-12 mt-5">
                    {{ Form::open(['route' => 'admin_users.index', 'method' => 'get']) }}
                        <div class="card-body px-4 py-3">
                            <div class="d-flex">
                                <!--姓-->
                                <div class="col-md-4">
                                    <div class="row pt-3">
                                        {{Form::label('last_name', '姓', ['class' => 'col-md-10 col-12 px-0'])}}
                                    </div>
                                    <div class="row pt-1">
                                        {{Form::text('last_name', null, ['class'=>'title col-md-10 col-12 border border-secondary mt-2 rounded'])}}
                                    </div>
                                </div>
                                <!--名-->
                                <div class="col-md-4">
                                    <div class="row pt-3">
                                        {{Form::label('first_name', '名', ['class' => 'col-md-10 col-12 px-0'])}}
                                    </div>
                                    <div class="row pt-1">
                                        {{Form::text('first_name', null, ['class'=>'title col-md-10 col-12 border border-secondary mt-2 rounded'])}}
                                    </div>
                                </div>
                                <!--メールアドレス-->
                                <div class="col-md-4">
                                    <div class="row pt-3">
                                        {{Form::label('email', 'メールアドレス', ['class' => 'col-md-10 col-12 px-0'])}}
                                    </div>
                                    <div class="row pt-1">
                                        {{Form::text('email', null, ['class'=>'title col-md-10 col-12 border border-secondary mt-2 rounded'])}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-12 justify-content-center">
                                <div class="border rounded p-3 text-center custom-bg-lightgray">
                                    {{ Form::submit('検索', ['class' => 'btn btn-primary']) }}
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                <!--ページネーション-->
                <div class="mb-1 mt-3">
                    {{ $admin_users->links('common.pagination') }}
                </div>
                <!--一覧-->
                <div class="card mt-3">
                    <div class="card-body px-5 py-3">
                        <!--新規登録ボタン-->
                        <a href="{{route('admin_users.create')}}" class="btn btn-primary text-white">新規作成</a>
                        <!--管理者一覧-->
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">メールアドレス</th>
                                        <th scope="col" class="text-end">変更日時</th>
                                        <th scope="col" class="text-end">登録日時</th>
                                        <th scope="col" class="text-center">レコード操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admin_users as $admin_user)
                                        <tr>
                                            <th scope="row">{{$admin_user->id}}</th>
                                            <td>{{$admin_user->last_name}}{{$admin_user->first_name}}</td>
                                            <td class="text-end">{{$admin_user->updated_at}}</td>
                                            <td class="text-end">{{$admin_user->created_at}}</td>
                                            <td class="text-center">
                                                <a href="{{route('admin_users.edit', $admin_user)}}" class="btn btn-primary text-white">編集</a>
                                            </td>
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
