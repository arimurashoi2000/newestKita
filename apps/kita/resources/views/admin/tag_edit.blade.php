@extends('layouts.app')
@section('title')
    <title>タグ編集画面</title>
@endsection
@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <h1>タグ管理 - 更新</h1>
            </div>
        </div>

        {{ Form::open(['route' => ['article_tags.update', $articleTag]]) }}
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-9 col-12">
                @include('common.flash_message')
                <div class="border rounded bg-white py-3">
                    <!--ID-->
                    <div class="col px-4 my-4">
                        <div class="row">
                            {{ Form::label('id','ID', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                        </div>
                        {{ Form::text('id', $articleTag->id, ['class' => 'form-control', 'disabled', 'id' => 'tag_id']) }}
                    </div>
                    <!--タグ名-->
                    <div class="col px-4 my-4">
                        <div class="row d-flex align-items-center">
                            {{ Form::label('name','タグ名', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                            <p class="badge mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::text('name', $articleTag->name, ['class' => 'form-control', 'id' => 'last_name']) }}
                    </div>

                    <!--更新日時-->
                    <div class="col px-4 my-4">
                        <div class="row">
                            {{ Form::label('updated_at','更新日時', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                        </div>
                        {{ Form::text('updated_at', $articleTag->updated_at, ['class' => 'form-control', 'disabled', 'id' => 'updated_at']) }}
                    </div>
                    <!--登録日時-->
                    <div class="col px-4 my-4">
                        <div class="row">
                            {{ Form::label('updated_at','登録日時', ['class' => 'col-md-auto col-form-label text-md-start']) }}
                        </div>
                        {{ Form::text('created_at', $articleTag->created_at, ['class' => 'form-control', 'disabled', 'id' => 'created_at']) }}
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-12">
                <div class="border rounded bg-white py-3 px-3">
                    <!--更新ボタン-->
                    <div class="col-md-12 col-12 text-center py-2">
                        {{ Form::submit('更新する', ['class' => 'btn btn-primary col-12']) }}
                    </div>
                    {{ Form::close() }}
                    <!--削除ボタン-->
                    {{ Form::open(['route' => ['article_tags.destroy', $articleTag], 'onsubmit' => "return confirm('一度削除すると元に戻せません。よろしいですか？');"]) }}
                    @csrf
                    @method('delete')
                    {{ Form::button('削除する', ['type' => 'submit', 'class' => 'btn btn-danger col-12 rounded']) }}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection
