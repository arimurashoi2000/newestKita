@extends('layouts.nav')
    @section('title')
        <title>記事一覧</title>
    @endsection
        @section('content')
            <div class="container py-5">
                <div class="d-flex align-items-center justify-content-center" style="--bs-bg-opacity: .1;">
                    <div class="col-md-7 col-10 bg-white text-dark">
                        <div class="card">
                            <div class="card-body px-5 py-3">
                                @foreach ($articles as $article)
                                    <div class="row pt-3">
                                        <div class="col-md-6">
                                            <p>{{$article->member->name}}が{{ $article->created_at->format('Y年m月d日') }}に投稿</p>
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
                                    <p>{{ $articles->links() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
