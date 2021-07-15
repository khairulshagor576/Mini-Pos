@extends('layouts.admin_layout')
@section('main_content')
<h2>Create New User</h2>
<!-- Group Data Showing Here -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create New User</h6>
    </div>
    <div class="card-body">
       <div class="row justify-content-md-center">
            <div class="col-md-6">
                <form method="POST" action="">
                    @csrf
                    <div class="form-group">
                      <label for="title">Group Title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter Group Title"> 
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
            </div>
       </div>
    </div>
</div>
@endsection
