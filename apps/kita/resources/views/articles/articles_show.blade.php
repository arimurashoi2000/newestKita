<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<!--削除用のボタン-->

<!--編集ボタン-->
<a href="{{ route('articles.edit', ['id' => $article->id]) }}">編集</a>

    <p>{{$article->title}}</p>
    <p>{{$article->created_at}}</p>
    <p>{!! nl2br($article->contents) !!}</p>



</body>
</html>
