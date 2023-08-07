@extends('layouts.admin_nav')
@section('title')
    <title>タグ編集画面</title>
@endsection
@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <h1>タグ管理 - 更新</h1>
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

        {{ Form::open(['route' => ['tag.update', $article_tag]]) }}
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-9 col-12">
                <div class="border rounded bg-white py-3">
                    <!--ID-->
                    <div class="col px-4 my-4">
                        <div class="row">
                            {{ Form::label('id','ID', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                        </div>
                        <p class="col-auto rounded bg-secondary text-black">{{$article_tag->id}}</p>
                    </div>
                    <!--タグ名-->
                    <div class="col px-4 my-4">
                        <div class="row">
                            {{ Form::label('name','タグ名', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                            <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::text('name', $article_tag->name, ['class' => 'form-control', 'id' => 'last_name']) }}
                    </div>

                    <!--更新日時-->
                    <div class="col px-4 my-4">
                        <div class="row">
                            {{ Form::label('updated_at','更新日時', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                        </div>
                        <p class="col-auto rounded bg-secondary text-black">{{$article_tag->updated_at}}</p>
                    </div>
                    <!--登録日時-->
                    <div class="col px-4 my-4">
                        <div class="row">
                            {{ Form::label('updated_at','登録日時', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                        </div>
                        <p class="col-auto rounded bg-secondary text-black">{{$article_tag->created_at}}</p>
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
                    <!--Todo 削除ボタン　タグ削除機能実装時-->

                </div>
            </div>
        </div>
    </div>
@endsection
