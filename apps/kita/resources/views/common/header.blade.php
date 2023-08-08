<div class="bg-white">
    <div class="container d-flex justify-content-center align-items-center bg-white">
        <nav class="navbar navbar-expand-sm navbar-light">
            <a href="{{route('articles.index')}}" class="btn btn-success rounded-circle me-3" style="font-size: 2rem; padding: 0.5rem 2rem;">Kita</a>

            <button class="navbar-toggler my-2 bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="justify-content-end collapse navbar-collapse" id="navbarSupportedContent">

                {{ Form::open(['route' => 'articles.search', 'method' => 'get', 'class' => 'd-flex']) }}
                    <div class="col-md-9">
                        {{ Form::text('keyword', null, ['class' => 'form-control form-control-lg me-2 border border-success search', 'placeholder' => 'Search for something', 'aria-label' => 'Search']) }}
                    </div>
                    <div class="col-auto">
                        {{Form::submit('検索', ['class'=>'btn btn-success btn-lg mr-2 search_button'])}}
                    </div>
                {{Form::close()}}

                <div class="ml-2">
                    <div class="col-auto">
                        {{ Form::open(['route' => 'articles.create', 'method' => 'get']) }}
                        {{ Form::button('<span style="color: black;">記事を作成する</span>', ['class' => 'search_button btn btn-outline-success btn-lg pl-2', 'type' => 'submit']) }}
                        {{Form::close()}}
                    </div>
                </div>

                <div class>
                    <div class="col-10 float-end">
                        <button class="btn btn-success btn-lg dropdown-toggle dropdown-toggle-no-caret" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

