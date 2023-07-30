@extends('layouts.admin_nav')
@section('title')
    <title>管理者登録画面</title>
@endsection

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-5 col-12">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <h1 class="py-2"><strong>Kita</strong><span style="font-size: 25px;">  Administrator console</span></h1>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body px-5 py-4">
                        {{ Form::open(['route'=>'admin.login', 'files'=>true]) }}
                        @csrf
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
                                    {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'required', 'autocomplete' => 'new-password']) }}

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-md mt-2">
                                    {{ Form::submit('ログイン', ['class' => 'btn btn-primary']) }}
                                </div>
                            </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
