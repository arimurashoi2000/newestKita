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
@foreach ($articles as $article)
   <p>{{$article->member->name}}</p>
    <p>{{$article->created_at}}</p>
    <p>{{$article->title}}</p>

@endforeach
<div class="mb-4">
    <p>{{ $articles->links('pagination::bootstrap-4') }}</p>
</div>

</body>
</html>
