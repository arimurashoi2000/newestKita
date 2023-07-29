@extends('layouts.app')
<<<<<<< Updated upstream

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
                        {{ Form::open(['route'=>'login', 'files'=>true]) }}
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
=======
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('admin/login') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('admin/password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
>>>>>>> Stashed changes
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
