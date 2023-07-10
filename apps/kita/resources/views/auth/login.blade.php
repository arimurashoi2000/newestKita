@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-5 col-12">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="border-bottom border-dark py-2"><strong>Kita</strong>ログイン</h1>
                </div>

            </div>

            <div class="card">
                <div class="card-body px-5 py-4">
                    {{ Form::open(['route'=>'login', 'files'=>true]) }}
                        @csrf

                    <div class="row mb-1">
                        <p class="text-md-end">新規会員登録は<a href="{{ route('register') }}">こちら</a></p>
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
                                {{ Form::submit('ログイン', ['class' => 'btn btn-success']) }}
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
