@extends('layouts.app')
@section('title')
    <title>管理者編集画面</title>
@endsection
@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <h1>管理者管理 - 編集</h1>
            </div>
        </div>

        {{ Form::open(['route' => ['admin_users.update', $admin_user]]) }}
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-9 col-12">
                @include('common.flash_message')
                <div class="border rounded bg-white py-3">
                    <!--ID-->
                    <div class="col px-4 my-4">
                        <div class="row">
                            {{ Form::label('id','id', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                        </div>
                        {{ Form::text('created_at', $admin_user->id, ['class' => 'form-control', 'disabled', 'id' => 'id']) }}
                    </div>
                    <!--姓-->
                    <div class="col px-4 my-4">
                        <div class="row d-flex align-items-center">
                            {{ Form::label('last_name','姓', ['class' => 'col-md-auto col-form-label text-md-start pt-0']) }}
                            <p class="badge mb-2 col-auto rounded bg-danger text-white" style="padding: 0.25rem;">必須</p>
                        </div>
                        {{ Form::text('last_name', $admin_user->last_name, ['class' => 'form-control', 'id' => 'last_name']) }}
                    </div>
                    <!--名-->
                    <div class="col px-4 my-4">
                        <div class="row d-flex align-items-center">
                            {{ Form::label('first_name','名', ['class' => 'col-md-auto col-form-label text-md-start pt-0']) }}
                            <p class="badge mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::text('first_name', $admin_user->first_name, ['class' => 'form-control', 'id' => 'first_name']) }}
                    </div>
                    <!--メールアドレス-->
                    <div class="col px-4 my-4">
                        <div class="row d-flex align-items-center">
                            {{ Form::label('email','メールアドレス', ['class' => 'col-md-auto col-form-label text-md-start pt-0']) }}
                            <p class="badge mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::email('email', $admin_user->email, ['class' => 'form-control', 'id' => 'email']) }}
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
                        {{ Form::text('created_at', $admin_user->updated_at, ['class' => 'form-control', 'disabled', 'id' => 'updated_at']) }}
                    </div>
                    <!--登録日時-->
                    <div class="col px-4 my-4">
                        <div class="row">
                            {{ Form::label('updated_at','登録日時', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                        </div>
                        {{ Form::text('created_at', $admin_user->created_at, ['class' => 'form-control', 'disabled', 'id' => 'created_at']) }}
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-12">
                <div class="border rounded bg-white py-3 px-3">
                    <!--更新ボタン-->
                    <div class="col-md-12 col-12 text-center py-2">
                        {{ Form::submit('更新する', ['class' => 'btn btn-primary col-12']) }}
                    </div>
        {{ Form::close() }}
                    <!--削除ボタン-->
                    {{ Form::open(['route' => ['admin_users.destroy', $admin_user], 'class' => 'col-md-12 col-12 text-center py-2',  'onsubmit' => "return confirm('一度削除すると元に戻せません。よろしいですか？');"]) }}
                    @csrf
                    @method('delete')
                    {{ Form::button('削除する', ['type' => 'submit', 'class' => 'btn btn-danger col-12 rounded']) }}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection
