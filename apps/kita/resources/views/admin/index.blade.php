@extends('layouts.app')
@section('title')
    <title>管理者画面</title>
@endsection
<script>
    $(function() {
        $('#search_button').click(
            function() {
                $.ajax({
                    url: "{{route('admin_users.index')}}",
                    method: 'get',
                }).done(function(data) {
                    alert('成功')
                }).fail(function() {
                    alert('失敗');
                });
            }
        );
    });
</script>
@section('content')
    <div class="content-wrapper mt-0 px-5 py-5">
        <h2 class="mt-3">管理者管理</h2>
            <div class="justify-content-center" style="--bs-bg-opacity: .1;">
                @include('common.flash_message')
                 <!--検索-->
                <div class="card col-md-12 mt-5 px-0">
                    {{ Form::open(['route' => 'admin_users.index', 'method' => 'get']) }}
                        <div class="card-body px-4 py-3">
                            <div class="d-flex">
                                <!--姓-->
                                <div class="form-group col-md-4">
                                    <div class="row pt-3">
                                        {{Form::label('last_name', '姓', ['class' => 'col-md-10 col-12 px-0'])}}
                                    </div>
                                    <div class="row pt-1 col-12 px-0">
                                        {{Form::text('last_name', request('last_name'), ['class'=>'form-control border border-secondary mt-2 rounded'])}}
                                    </div>
                                </div>
                                <!--名-->
                                <div class="form-group col-md-4">
                                    <div class="row pt-3">
                                        {{Form::label('first_name', '名', ['class' => 'col-md-10 col-12 px-0'])}}
                                    </div>
                                    <div class="row pt-1 col-12 px-0">
                                        {{Form::text('first_name', request('first_name'), ['class'=>'form-control border border-secondary mt-2 rounded'])}}
                                    </div>
                                </div>
                                <!--メールアドレス-->
                                <div class="form-group col-md-4">
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
                <!--ページネーション-->
                <div class="mb-1 mt-3">
                    {{ $adminUsers->appends(request()->query())->links('common.pagination') }}
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
                                        <th scope="col">名前</th>
                                        <th scope="col">メールアドレス</th>
                                        <th scope="col" class="text-end">変更日時</th>
                                        <th scope="col" class="text-end">登録日時</th>
                                        <th scope="col" class="text-center">レコード操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adminUsers as $adminUser)
                                        <tr>
                                            <th scope="row">{{$adminUser->id}}</th>
                                            <td>{{$adminUser->last_name}}　{{$adminUser->first_name}}</td>
                                            <td>{{$adminUser->email}}</td>
                                            <td class="text-end">{{$adminUser->updated_at}}</td>
                                            <td class="text-end">{{$adminUser->created_at}}</td>
                                            <td class="text-center">
                                                <a href="{{route('admin_users.edit', $adminUser)}}" class="btn btn-primary text-white">編集</a>
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
