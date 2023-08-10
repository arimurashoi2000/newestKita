@if (session('message'))
    <div class="alert alert-success">
        <h5 class="fw-bolder">Success!</h5>
        {{ session('message') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <h5 class="fw-bolder">Fail!</h5>
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        <h5 class="fw-bolder">Fail!</h5>
        {{ session('error') }}
    </div>
@endif
