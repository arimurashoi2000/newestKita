@extends('layouts.admin_nav')
@section('title')
    <title>管理者画面</title>
@endsection
@section('content')
    <div class="container mt-0">
        <h2 class="mt-3">管理者管理</h2>
        <div class="justify-content-center" style="--bs-bg-opacity: .1;">
            <!--検索-->
            <div class="card col-md-12 mt-5">
                <div class="card-body px-4 py-3">
                    {{ Form::open(['route' => 'tag.index']) }}
                    @csrf
                    <div class="d-flex">
                        <!--タグ名-->
                        <div class="col-md-4">
                            <div class="row pt-3">
                                {{Form::label('name', 'タグ名', ['class' => 'col-md-10 col-12 px-0'])}}
                            </div>
                            <div class="row pt-1">
                                {{Form::text('name', null, ['class'=>'title col-md-10 col-12 border border-success mt-2 rounded'])}}
                            </div>
                        </div>
                    </div>

                    <!--検索ボタン-->
                    <div class="row">
                        <div class="d-flex justify-content-center col-md-12 col-12 px-0 ">
                            {{Form::submit('検索', ['class'=>'submit_button btn btn-primary text-white my-3 rounded btn-lg'])}}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
            <!--ページネーション-->
            <div class="text-start mb-1 mt-3">
                <p>{{ $article_tags->links() }}</p>
            </div>
            <!--一覧-->
            <div class="card mt-5">
                <div class="card-body px-5 py-3">
                    <!--新規登録(仮)-->
                    <a href="{{route('tag.index')}}" class="btn btn-primary text-white">新規登録</a>
                    <!--管理者一覧-->
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">タグ名</th>
                            <th scope="col">登録日時</th>
                            <th scope="col">レコード操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($article_tags as $article_tag)
                            <tr>
                                <th scope="row">{{$article_tag->id}}</th>
                                <td>{{$article_tag->name}}</td>
                                <td>{{$article_tag->created_at}}</td>
                                <td>
                                    <a href="#" class="btn btn-primary text-white">編集</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
