@if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
         <strong>Error!</strong>{{$error}}
    </div>
    @endforeach
@endif

@if (session('error'))
    <div class="alert alert-danger alert alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Oh!</strong>{{session('error')}}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Great!</strong>{{session('success')}}
    </div>
@endif