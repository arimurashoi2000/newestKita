@extends('layouts.app')
@section('title')
    <title>記事一覧</title>
@endsection
@section('content')
    <div class="container py-5">
        <div class="d-flex align-items-center justify-content-center" style="--bs-bg-opacity: .1">
            <div class="col-md-8 col-10 bg-white text-dark">
                <!--TODO 記事編集機能完成後はこの記述を編集画面へ移動させる-->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-body px-5 py-3">
                        {{ Form::open(['route' => 'articles.store']) }}
                        @csrf
                        <!--タイトル-->
                        <div class="row pt-3">
                            {{Form::label('title', 'タイトル', ['class' => 'col-md-12 col-12 px-0'])}}
                        </div>

                        <div class="row pt-3">
                            {{Form::text('title', null, ['class'=>'title col-md-12 col-12 border border-success mt-2 rounded'])}}
                        </div>

                        <!--タグ-->
                        <div class="row pt-3">
                            {{Form::label('tags', 'タグ', ['class' => 'col-md-12 col-12 px-0'])}}
                        </div>

                        <div class="row pt-2">
                            <div class="col-md-12 col-12">
                                <select class="form-select border-success" size="3" aria-label="size 3 select example" name="tag_id[]" multiple>
                                    @foreach ($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!--記事内容-->
                        <div class="row pt-3">
                            {{Form::label('contents', '記事内容', ['class'=>'col-md-12 col-12 px-0 '])}}
                        </div>

                        <div class="row">
                            {{Form::textarea('contents', null, ['class'=>'contents col-md-12 col-12 border border-success mt-2 rounded', 'style' => 'height: 400px;'])}}
                        </div>

                        <!--投稿ボタン-->
                        <div class="row">
                            <div class="col-md-12 col-12 text-md-end px-0">
                                {{Form::submit('投稿する', ['class'=>'submit_button btn btn-success my-3 rounded'])}}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
