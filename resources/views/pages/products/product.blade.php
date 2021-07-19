@extends('layouts.admin_layout')
@section('main_content')
<div class="row clearfix page_header">
    <div class="col-md-6">
        <h2>Products</h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ route('products.create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Product</a>
    </div>
</div>
<!-- Group Data Showing Here -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Product's Data</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="20">ID</th>
                        <th width="100">Category</th>
                        <th width="50">Title</th>
                        <th width="100">Description</th>
                        <th width="60">Cost Price</th>
                        <th width="60">Price</th>
                        <th width="150" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <tr>
                            <th width="20">ID</th>
                            <th width="100">Category</th>
                            <th width="50">Title</th>
                            <th width="100">Description</th>
                            <th width="60">Cost Price</th>
                            <th width="60">Price</th>
                            <th width="150" class="text-center">Actions</th>
                        </tr>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($products as $product )
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->category->title }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->cost_price }}</td>
                        <td>{{ $product->price }}</td>
                        <td class="text-center">
                            <form action="{{ url('products/'.$product->id) }}" method="POST">
                                <a href="{{ route('products.show',[$product->id]) }}" class="btn   btn-primary"><i class="fa fa-eye"></i>
                                </a>  
                                <a href="{{ route('products.edit',[$product->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i>
                                </a>  
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
