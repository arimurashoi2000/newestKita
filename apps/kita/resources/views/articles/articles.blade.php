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
{{ Form::open(['route' => 'articles.search', 'method' => 'get']) }}
{{Form::label('search', '検索')}}
{{Form::text('keyword', null, ['class'=>'search'])}}
{{Form::submit('検索する', ['class'=>'search_button'])}}
{{Form::close()}}

<!--記事投稿-->
{{ Form::open(['url' => route('articles.create'), 'method' => 'get']) }}
{{Form::submit('記事を作成する', ['class'=>'search_button'])}}
{{Form::close()}}

@foreach ($articles as $article)
   <p>{{$article->member->name}}</p>
    <p>{{$article->created_at}}</p>
    <p>{{$article->title}}</p>
    <p>{{$article->contents}}</p>
   <!--仮の編集ボタン-->
   <a href="{{ route('articles.edit', ['id' => $article->id]) }}">編集</a>

@endforeach
<div class="mb-4">
    <p>{{ $articles->links('pagination::bootstrap-4') }}</p>
</div>

</body>
</html>
