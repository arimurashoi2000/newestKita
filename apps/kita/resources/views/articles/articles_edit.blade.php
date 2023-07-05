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
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

{{ Form::open(['route' => ['update', $article->id]]) }}
@csrf
{{Form::label('title', 'タイトル')}}
{{Form::text('title', $article->title, ['class'=>'title'])}}
{{Form::label('contents', '記事内容')}}
{{Form::textarea('contents', $article->contents, ['class'=>'contents'])}}

{{Form::submit('編集する', ['class'=>'submit_button'])}}

{{Form::close()}}

</body>
</html>
