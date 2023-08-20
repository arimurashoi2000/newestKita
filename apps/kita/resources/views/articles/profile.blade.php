@extends('layouts.app')
@section('title')
    <title>プロフィール編集</title>
@endsection
@section('content')
    <div class="container py-5">
        <div class="d-flex align-items-center justify-content-center" style="--bs-bg-opacity: .1;">
            <div class="col-md-8 col-10 text-dark">
                @include('common.flash_message')

                <div class="card">
                    <div class="card-body px-5 py-3">
                        <div class="row pt-3">
                            <h2 class="col-md-12 col-12 border-bottom border-dark py-2">プロフィール編集</h2>
                        </div>
                        {{ Form::open(['route' => 'profile.update']) }}
                        @csrf
                        @method('put')
                            <!--タイトル-->
                            <div class="row pt-3">
                                {{Form::label('name', 'ユーザー名', ['class' => 'col-md-12 col-12 px-0'])}}
                            </div>
                            <div class="row pt-1">
                                {{Form::text('name', $member->name, ['class'=>'title col-md-12 col-12 border border-success mt-2 rounded'])}}
                            </div>
                            <!--メールアドレス-->
                            <div class="row pt-3">
                                {{Form::label('email', 'メールアドレス', ['class' => 'col-md-12 col-12 px-0'])}}
                            </div>
                            <div class="row pt-1">
                                {{Form::text('email', $member->email, ['class'=>'title col-md-12 col-12 border border-success mt-2 rounded'])}}
                            </div>
                            <!--パスワード-->
                            <div class="row pt-3 ml-0">
                                {{Form::label('password', 'パスワード', ['class' => 'col-md-12 col-12 px-0'])}}
                            </div>
                            <div class="row pt-1">
                                <div class="col-md-2 px-0">
                                    <p>*****</p>
                                </div>
                                <div class="col-md-3 px-0">
                                    <button type="button" class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#passwordChangeModal">パスワードを変更する</button>
                                </div>
                            </div>

                            <!--投稿ボタン-->
                            <div class="row">
                                <div class="col-md-12 col-12 text-md-end px-0">
                                    {{Form::submit('更新する', ['class'=>'submit_button btn btn-success my-3 rounded-pill'])}}
                                </div>
                            </div>
                        {{ Form::close() }}

                        <!-- パスワード変更モーダル -->
                        <div class="modal fade" id="passwordChangeModal" tabindex="-1" aria-labelledby="passwordChangeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <!-- モーダルのヘッダー -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="passwordChangeModalLabel">パスワードを変更する</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <!-- モーダルのボディ -->
                                    <div class="modal-body">
                                        <div class="form px-3">
                                            {{ Form::open(['route' => 'password.update']) }}
                                            @csrf
                                            @method('put')
                                            <!--新しいパスワード-->
                                            <div class="row pt-3">
                                                {{Form::label('password', '新しいパスワード', ['class' => 'col-md-12 col-12 px-0'])}}
                                            </div>

                                            <div class="row pt-1">
                                                {{Form::text('password', null, ['class'=>'title col-md-12 col-12 border border-success mt-2 rounded'])}}
                                            </div>

                                            <!--確認用のパスワード-->
                                            <div class="row pt-3">
                                                {{Form::label('password_confirmation', '新しいパスワード(確認)', ['class' => 'col-md-12 col-12 px-0'])}}
                                            </div>

                                            <div class="row pt-1">
                                                {{Form::text('password_confirmation', null, ['class'=>'title col-md-12 col-12 border border-success mt-2 rounded'])}}
                                            </div>

                                            <!--更新ボタン-->
                                            <div class="row">
                                                <div class="col-md-12 col-12 text-md-end px-0">
                                                    {{Form::submit('更新する', ['class'=>'submit_button btn btn-success my-3 rounded-pill'])}}
                                                </div>
                                            </div>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
