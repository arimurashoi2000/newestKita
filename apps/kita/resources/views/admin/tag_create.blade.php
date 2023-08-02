@extends('layouts.admin_nav')
@section('title')
    <title>タグ管理-新規作成</title>
@endsection
@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <h1>タグ管理 - 新規作成</h1>
            </div>
        </div>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session('fail'))
            <div class="alert alert-danger">
                {{ session('fail') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ Form::open(['route' => 'tag.store', 'method' => 'POST']) }}
        @csrf
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="border rounded bg-white py-3">
                        <!--タグ名-->
                        <div class="col px-4 my-4">
                            <div class="row">
                                {{ Form::label('tag_name','タグ名', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                                <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                            </div>
                            {{ Form::text('tag_name', null, ['class' => 'form-control', 'id' => 'last_name']) }}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="border rounded bg-white py-3 px-3">
                        <!--更新ボタン-->
                        <div class="col-md-12 col-12 text-center py-2">
                            {{ Form::submit('登録する', ['class' => 'btn btn-primary col-12']) }}
                        </div>
        {{ Form::close() }}
                    </div>
                </div>
            </div>
    </div>
@endsection
