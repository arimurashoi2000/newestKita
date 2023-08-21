@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-5 col-12">
            <!--kita会員登録と表示-->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="border-bottom border-dark py-2"><strong>Kita</strong>会員登録</h1>
                </div>
            </div>

            <div class="card">
                <div class="card-body px-5 py-4">
                    {{ Form::open(['route'=>'members.register', 'files'=>true]) }}
                    <div class="row mb-1">
                        {{ Form::label('name','ユーザー名', ['class' => 'col-md col-form-label text-md-start']) }}
                    </div>

                    <div class="row mb-2">
                        <div class="col-md text-center">
                            {{ Form::text('name', old('name'), ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required', 'autocomplete' => 'name', 'autofocus']) }}
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-1">
                        {{ Form::label('email', 'メールアドレス', ['class' => 'col-md col-form-label text-md-start']) }}
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

                    <div class="row mb-1">
                        {{ Form::label('password', 'パスワード', ['class'=>'col-md col-form-label text-md-start']) }}
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

                    <div class="row mb-1">
                        {{ Form::label('password-confirm', 'パスワード(確認用)', ['class'=>'col-md col-form-label text-md-start']) }}
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


                    <div class="row mb-0">
                        <div class="col-md mt-2">
                            {{ Form::submit('登録する', ['class' => 'btn btn-success']) }}
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
