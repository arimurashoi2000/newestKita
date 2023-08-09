<div class="bg-black">
    <div class="container d-flex justify-content-center align-items-center bg-black">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <!--kita-->
                        <a class="nav-link active fs-4 text-white" aria-current="page" href="#">Kita</a>

                        <button class="navbar-toggler my-2 bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!--管理者管理-->
                        <a class="nav-link active fs-4 text-white" href="{{route('admin.index')}}">管理者管理</a>
                        <!--会員管理-->
                        <a class="nav-link active fs-4 text-white" href="#">会員管理</a>
                        <!--タグ管理-->
                        <a class="nav-link active fs-4 text-white" href="#">タグ管理</a>
                        <!--ログアウトボタン-->
                        <button class="btn btn-outline-light btn-dark btn-lg pl-2 text-end"><span style="color: white;">ログアウト</span></button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

