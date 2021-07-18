@extends('layouts.admin_layout')
@section('main_content')
<h2>Category</h2>
<!-- Group Data Showing Here -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create New Category</h6>
    </div>
    <div class="card-body">
       <div class="row justify-content-md-center">
            <div class="col-md-8">
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                        </div>
                    </div>  
                    <div class="mt-4 text-right">    
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                    </form>
            </div>
       </div>
    </div>
</div>
@endsection
