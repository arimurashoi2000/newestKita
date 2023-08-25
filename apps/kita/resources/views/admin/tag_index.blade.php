@extends('layouts.app')
@section('title')
    <title>タグ管理</title>
@endsection
@section('content')
    <div class="content-wrapper mt-0 px-5 py-5">
        <h2 class="mt-3">タグ管理</h2>
        @include('common.flash_message')
        <div class="justify-content-center" style="--bs-bg-opacity: .1;">
            <!--検索-->
            <div class="card col-md-12 mt-5 px-0">
                {{ Form::open(['route' => 'article_tags.index', 'method' => 'get']) }}
                    <div class="card-body col-md-12 px-4 py-3">
                        <!--タグ名-->
                        <div class="col-md-12 col-12">
                            <div class="row pt-3">
                                {{Form::label('name', 'タグ名', ['class' => 'col-md-11 col-12 px-0 ms-3'])}}
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="row pt-1 col-12 px-0 d-flex justify-content-center align-items-center">
                                    {{Form::text('name', request('name'), ['class'=>'border border-secondary title mt-2 rounded ms-3'])}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-center px-0">
                        {{ Form::submit('検索', ['class' => 'btn btn-primary']) }}
                    </div>
                {{ Form::close() }}
            </div>
            <!--ページネーション-->
            <div class="text-start mb-1 mt-3">
                <p>{{ $articleTags->appends(request()->query())->links('common.pagination') }}</p>
            </div>
            <!--一覧-->
            <div class="card mt-5">
                <div class="card-body px-5 py-3">
                    <!--新規登録-->
                    <a href="{{route('article_tags.create')}}" class="btn btn-primary text-white">新規登録</a>
                    <!--管理者一覧-->
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">タグ名</th>
                                <th scope="col" class="text-end">登録日時</th>
                                <th scope="col" class="text-center">レコード操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($articleTags as $articleTag)
                                    <tr>
                                        <th scope="row">{{$articleTag->id}}</th>
                                        <td>{{$articleTag->name}}</td>
                                        <td class="text-end">{{$articleTag->created_at}}</td>
                                        <td class="text-center">
                                            <a href="{{route('article_tags.edit', $articleTag)}}" class="btn btn-primary text-white">編集</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
