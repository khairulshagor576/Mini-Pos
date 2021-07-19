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
            <div class="col-md-8">
                <form method="POST" action="{{ route('products.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <textarea type="text" class="form-control" name="description" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Category<span class="text-danger">*</span></label>
                        <div class="col-sm-5">
                          <select class="form-control" name="category_id">
                                  <option value="">Select Category</option>
                                  @foreach ($categories as $key => $value)
                                  <option value="{{ $key }}">{{ $value }}</option>
                                  @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cost_price" class="col-sm-2 col-form-label">Cost Price</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" name="cost_price" id="cost_price" placeholder="Cost Price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Sale Price<span class="text-danger">*</span></label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label"></span></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i><span class="ml-2">Submit</span></button>
                        </div>
                    </div>   
                </form>
            </div>
       </div>
    </div>
</div>
@endsection
