@extends('layouts.admin_layout')
@section('main_content')
<h2>Update <strong>{{ $product->title}}</strong> Information</h2>
<!-- Group Data Showing Here -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Product</h6>
    </div>
    <div class="card-body">
       <div class="row justify-content-md-center">
            <div class="col-md-8">
                <form method="POST" action="{{ route('products.update',$product->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="title" id="title" value="{{ $product->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <textarea type="text" class="form-control" name="description">{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Category<span class="text-danger">*</span></label>
                        <div class="col-sm-5">
                          <select class="form-control" name="category_id">
                                  <option value="">Select Group</option>
                                  @foreach ($categories as $key => $value)
                                    @if($product->category_id==$key)
                                    <option selected value="{{ $product->category_id }}">{{ $value }}</option>
                                    @endif
                                  @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cost_price" class="col-sm-2 col-form-label">Cost Price<span class="text-danger">*</span></label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" name="cost_price" id="cost_price" value="{{ $product->cost_price }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Sale Price</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
       </div>
    </div>
</div>
@endsection
