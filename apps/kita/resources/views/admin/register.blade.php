@extends('layouts.app')

@section('content')
    <div class="container mx-5">
        <div class="row d-flex">
            <div class="row">
                <h2>管理者管理 - 新規登録</h2>
            </div>
            <div class="row col-md-12 d-flex">
                <!-- 1つ目のカード -->
                {{ Form::open(['route'=>'admin.register', 'files'=>true]) }}
                <div class="card col-md-9">
                    <div class="card-body px-5 py-4">
                        <!--性-->
                        <div class="row align-items-center mb-1">
                            <div class="col-md-auto">
                                {{ Form::label('last_name','ユーザー名', ['class' => 'col-md col-form-label text-md-start']) }}
                            </div>
                            <div class="col-md-auto">
                                <p class="bg-danger text-white my-0 px-2">必須</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md text-center">
                                {{ Form::text('last_name', old('last_name'), ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'required', 'autocomplete' => 'last_name', 'autofocus']) }}
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!--名-->
                        <div class="row align-items-center mb-1">
                            <div class="col-md-auto">
                                {{ Form::label('first_name','ユーザー名', ['class' => 'col-md col-form-label text-md-start']) }}
                            </div>
                            <div class="col-md-auto">
                                <p class="bg-danger text-white my-0 px-2">必須</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md text-center">
                                {{ Form::text('first_name', old('first_name'), ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'required', 'autocomplete' => 'first_name', 'autofocus']) }}
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!--メールアドレス-->
                        <div class="row align-items-center mb-1">
                            <div class="col-md-auto">
                                {{ Form::label('email', 'メールアドレス', ['class' => 'col-md col-form-label text-md-start']) }}
                            </div>
                            <div class="col-md-auto">
                                <p class="bg-danger text-white my-0 px-2">必須</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md text-center">
                                {{ Form::email('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required', 'autocomplete' => 'email']) }}

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!--パスワード-->
                        <div class="row align-items-center mb-1">
                            <div class="col-md-auto">
                                {{ Form::label('password', 'パスワード', ['class'=>'col-md col-form-label text-md-start']) }}
                            </div>
                            <div class="col-md-auto">
                                <p class="bg-danger text-white my-0 px-2">必須</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md text-center">
                                {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'required', 'autocomplete' => 'new-password', 'name' => 'password']) }}
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!--パスワード(確認用)-->
                        <div class="row align-items-center mb-1">
                            <div class="col-md-auto">
                                {{ Form::label('password-confirm', 'パスワード(確認用)', ['class'=>'col-md col-form-label text-md-start']) }}
                            </div>
                            <div class="col-md-auto">
                                <p class="bg-danger text-white my-0 px-2">必須</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md text-center">
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'required', 'autocomplete' => 'new-password']) }}
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 2つ目-->
                <div class="col-md-3 col-12">
                    <div class="border rounded bg-white py-3 px-3">
                        <div class="col-md-12 col-12 text-center py-2">
                            {{ Form::submit('登録する', ['class' => 'btn btn-primary col-12']) }}
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
