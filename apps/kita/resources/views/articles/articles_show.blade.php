<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
<div class="container py-5">
    <div class="d-flex align-items-center justify-content-center">
        <div class="col-md-7 col-10 text-dark">
            <div>
                <div class="card">
                    <div class="card-body px-5 py-3">
                        <!--削除、編集用のボタン-->
                        <div class="row d-flex justify-content-end">
                            <div class="col-md-2 text-end">
                                {{ Form::open(['route' => ['articles.destroy', $article], 'onsubmit' => "return confirm('一度削除すると元に戻せません。よろしいですか？');"]) }}
                                @csrf
                                @method('delete')
                                {{ Form::button('削除する', ['type' => 'submit', 'class' => 'btn btn-danger col-12 rounded-pill']) }}
                                {{Form::close()}}
                            </div>

                            <div class="col-md-2 text-end">
                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-success rounded-pill">編集する</a>
                            </div>
                        </div>

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
                    </div>
                </div>
            </div>


                <!--コメント一覧とコメント作成-->

            <div class="mt-3">
                <div class="card py-3">
                    <div class="card-body px-5 py-3">
                        <div class="row">
                            <div class="col-md-12 col-12 border-bottom border-dark py-1">
                                <h3>コメント</h3>
                            </div>
                        </div>
                        <!--コメント機能実装後にコメント表示-->
                        @foreach ($comments as $comment)
                            <!--ユーザー名＋created_at-->
                            <div class="row mt-1">
                                <div class="col-md-12 col-12">
                                    <p>{{$comment->member->name}}が{{ $comment->created_at->format('Y年m月d日') }}に投稿</p>
                                </div>
                            </div>

                            <!--コメント-->
                            <div class="row">
                                <div class="col-md-12 col-12 border-bottom border-dark py-1">
                                    <p>{{$comment->contents}}</p>
                                </div>
                            </div>
                        @endforeach

                        <!--コメント投稿フォーム-->
                        <div class="row px-3">
                            {{ Form::open(['route' => ['comments.store', $article->id], 'class' => 'd-flex align-items-end px-0']) }}
                            @csrf
                            {{ Form::hidden('article_id', $article->id) }}
                            <div class="col-md-10 col-10">
                                {{ Form::textarea('contents', null, ['class'=>'contents form-control border border-success mt-2 rounded　bg bg-white', 'placeholder' => 'コメントを入力', 'style' => 'height: 150px;']) }}
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
</body>
</html>
