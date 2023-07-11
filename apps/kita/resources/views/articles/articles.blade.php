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

@include('articles.header')
<div class="container py-5">
    <div class="d-flex align-items-center justify-content-center bg-secondary" style="--bs-bg-opacity: .1 height: 80vh;">
        <div class="col-md-7 col-10 bg-white text-dark">

            <div class="card">
                <div class="card-body px-5 py-3">
                    @foreach ($articles as $article)
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <p>{{$article->member->name}}が{{ $article->created_at->format('Y年m月d日') }}に投稿<p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <h3 class="font-weight-bold">{{$article->title}}</h3>
                            </div>
                        </div>
                        <!--タグ一覧-->
                        <div class="row">
                            <div class="col-md-12 col-12 border-bottom border-dark py-2"></div>
                        </div>
                    @endforeach
                    <div class="d-flex align-items-center justify-content-center mb-1 mt-3">
                        <p>{{ $articles->links('pagination::bootstrap-4') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
</body>

