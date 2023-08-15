@extends('layouts.app')
@section('title')
    <title>記事詳細</title>
@endsection
@section('content')
    <div class="container py-5">
        <div class="d-flex align-items-center justify-content-center">
            <div class="col-md-7 col-10 text-dark">
                @include('common.flash_message')
                <div>
                    <div class="card">
                        <div class="card-body ps-4 px-5 py-3">
                            <!--削除、編集用のボタン-->
                            @if(auth()->guard('members')->check() && auth()->id() == $article->member_id)
                                <div class="row d-flex justify-content-end">
                                    <div class="col-md-2 text-end">
                                        {{ Form::open(['route' => ['articles.destroy', $article], 'onsubmit' => "return confirm('一度削除すると元に戻せません。よろしいですか？');"]) }}
                                        @csrf
                                        @method('delete')
                                        {{ Form::button('削除する', ['type' => 'submit', 'class' => 'btn btn-danger col-12 rounded-pill']) }}
                                        {{Form::close()}}
                                    </div>

                                    <div class="col-md-2 text-end">
                                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-success rounded-pill">編集する</a>
                                    </div>
                                </div>
                            @endif

                            <!--タイトル-->
                            <div class="row pt-4">
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
                                <div class="col-md-auto">
                                    <ul class="list-inline">
                                        @foreach($tags as $tag)
                                            <li class="badge list-inline-item bg-primary text-white fw-bold rounded px-2 py-1 mb-2">{{$tag->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!--記事の本文-->
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <p>{!! nl2br($article->contents) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--コメント一覧とコメント作成-->
                <div class="mt-3">
                    <div class="card py-3">
                        <div class="card-body ps-4 px-5 py-3">
                            <div class="row">
                                <div class="col-md-12 col-12 border-bottom border-dark py-1">
                                    <h3>コメント</h3>
                                </div>
                            </div>
                            <!--コメント表示-->
                            @foreach ($comments as $comment)
                                <!--ユーザー名＋created_at-->
                                <div class="row mt-3">
                                    <div class="col-md-12 col-12">
                                        <p class="my-0">{{$comment->member->name}}が{{ $comment->created_at->format('Y年m月d日') }}に投稿</p>
                                    </div>
                                </div>

                                <!--コメント-->
                                <div class="row">
                                    <div class="col-md-12 col-12 border-bottom border-dark py-1">
                                        <p>{!! nl2br(($comment->contents)) !!}</p>
                                    </div>
                                </div>
                            @endforeach

                            <!--コメント投稿フォーム-->
                            <div class="row px-3">
                                {{ Form::open(['route' => ['comments.store', $article->id], 'class' => 'd-flex align-items-end px-0']) }}
                                @csrf
                                    {{ Form::hidden('article_id', $article->id) }}
                                    <div class="col-md-10 col-10">
                                        {{ Form::textarea('contents', null, ['class'=>'contents form-control border border-success mt-4 rounded　bg bg-white', 'placeholder' => 'コメントを入力する', 'style' => 'height: 150px;']) }}
                                    </div>
                                    <div class="col-md-2 col-2 d-flex justify-content-end">
                                        {{ Form::submit('コメント', ['class'=>'btn btn-outline-success rounded-pill']) }}
                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
