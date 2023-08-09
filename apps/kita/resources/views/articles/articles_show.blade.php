@extends('layouts.app')
@section('title')
    <title>記事詳細</title>
@endsection
@section('content')
    <div class="container py-5">
        <div class="d-flex align-items-center justify-content-center" style="--bs-bg-opacity: .1">
            <div class="col-md-7 col-10 bg-white text-dark">
                <div class="card">
                    <div class="card-body px-5 py-3">
                        <!--削除、編集用のボタン-->
                        @if(auth()->guard('members')->check() && auth()->id() == $article->member_id)
                            <div class="row d-flex justify-content-end">
                                <div class="col-md-2 text-end">
                                    <a href="#" class="btn btn-danger rounded-pill">削除する</a>
                                </div>

                                <div class="col-md-2 text-end">
                                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-success rounded-pill">編集する</a>
                                </div>
                            </div>
                        @endif

                        <!--タイトル-->
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <h3>{{$article->title}}</h3>
                            </div>
                        </div>

                        <!--ユーザー名＋created_at-->
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <p>{{$article->member->name}}が{{ $article->created_at->format('Y年m月d日') }}に投稿<p>
                            </div>
                        </div>

                        <!--タグ一覧-->
                        <div class="row">
                            <div class="col-md-12 col-12"></div>
                        </div>

                        <!--記事の本文-->
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <p>{!! nl2br($article->contents) !!}</p>
                            </div>
                        </div>
                        <!--TODO コメント機能実装後にコメント表示-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
