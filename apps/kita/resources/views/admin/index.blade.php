@extends('layouts.admin_nav')
@section('title')
    <title>管理者画面</title>
@endsection
@section('content')
    <div class="container py-5">
            <div class="d-flex align-items-center justify-content-center" style="--bs-bg-opacity: .1;">
                <!--ページング-->
                <div class="col-md-7 col-10 text-dark"><div class="d-flex align-items-center justify-content-center mb-1 mt-3">
                        <p>{{ $admin_users->links() }}</p>
                </div>

                 <!--検索-->

                <!--一覧-->
                <div class="card">
                    <div class="card-body px-5 py-3">
                        <!--新規登録-->

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
                                            <a href="#" class="btn btn-primary text-white">編集</a>
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
