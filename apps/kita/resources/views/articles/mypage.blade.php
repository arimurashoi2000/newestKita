@extends('layouts.app')
@section('title')
    <title>マイページ</title>
@endsection
@section('content')

    <div class="container py-5">
        <div class="d-flex justify-content-center" style="--bs-bg-opacity: .1;">
            <div class="col-md-7 col-10text-dark">
                @include('common.flash_message')
                <div class="card">
                    <div class="card-body px-5 py-3">
                            <div class="col-auto text-start px-0">
                                {{ Form::submit('削除する', ['class' => 'btn btn-danger rounded-pill', 'id' => 'delete']) }}
                            </div>

                            @foreach ($myArticle as $article)
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <p class="mb-0">{{$article->member->name}}が{{ $article->created_at->format('Y年m月d日') }}に投稿</p>
                                    </div>
                                </div>

                                <div class="row mt-2 d-flex align-items-center">
                                    <div class="col-md-1">
                                        <input type="checkbox" name="selected_articles[]" value="{{ $article->id }}" data-article-id="{{ $article->id }}" data-key="{{ $article->id }}">
                                    </div>
                                    <div class="col-md-11 col-12">
                                        <h3 class="font-weight-bold"><a href="{{ route('articles.show', $article) }}" style="color: black; text-decoration: none;">{{ $article->title }}</a></h3>
                                    </div>
                                </div>

                                <div class="row border-bottom">
                                    <div class="col-md-auto">
                                        <ul class="list-inline">
                                            @foreach($article->tags as $tag)
                                                <li class="badge list-inline-item bg-primary text-white fw-bold rounded px-2 py-1 mb-1" style="padding: 0.25rem;">{{$tag->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex align-items-center justify-content-center mb-1 mt-3" id="pagination-container">
                                <p>{{ $myArticle->links() }}</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
