<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ Form::open(['route' => 'articles.search', 'method' => 'get']) }}
{{Form::label('search', '検索')}}
{{Form::text('keyword', null, ['class'=>'search'])}}
{{Form::submit('検索する', ['class'=>'search_button'])}}

{{Form::close()}}

@foreach ($articles as $article)
   <p>{{$article->member->name}}</p>
    <p>{{$article->created_at}}</p>
    <p>{{$article->title}}</p>
    <p>{{$article->contents}}</p>

@endforeach
<div class="mb-4">
    <p>{{ $articles->links('pagination::bootstrap-4') }}</p>
</div>

</body>
</html>
