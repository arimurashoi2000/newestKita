@extends('layouts.app')
@section('title')
    <title>タグ管理-新規作成</title>
@endsection
@section('content')
    <div class="content-wrapper container">
        <div class="row pt-5">
            <div class="col">
                <h1>タグ管理 - 新規作成</h1>
            </div>
        </div>

        @include('common.flash_message')
        {{ Form::open(['route' => 'article_tags.store', 'method' => 'POST']) }}
        @csrf
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="border rounded bg-white py-3">
                        <!--タグ名-->
                        <div class="col px-4 my-4">
                            <div class="row d-flex align-items-center">
                                {{ Form::label('name','タグ名', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                                <p class="badge mb-2 col-auto rounded bg-danger text-white">必須</p>
                            </div>
                            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'last_name']) }}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="border rounded bg-white py-3 px-3">
                        <!--更新ボタン-->
                        <div class="col-md-12 col-12 text-center py-2">
                            {{ Form::submit('登録する', ['class' => 'btn btn-primary col-12']) }}
                        </div>
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </div>
@endsection
