@extends('layouts.admin_layout')
@section('main_content')
<div class="row clearfix page_header">
    <div class="col-md-4 text-left">
        <a href="{{ route('products.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>Back</a>
    </div>
    {{-- <div class="col-md-8 text-right">
        <a href="{{ url('products/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Sale</a>
        <a href="{{ url('products/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Purchase</a>
        <a href="{{ url('products/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Payment</a>
        <a href="{{ url('products/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Recipt</a>
    </div> --}}
</div>
<!-- Group Data Showing Here -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><strong>{{ $product->title }}</strong> Product's Details</h6>
    </div>
    <div class="card-body">
        <div class="row clearfix justify-content-md-center">
             <div col-md-8>
                <table class="table table-striped">
                    <tr>
                        <th>Category :</th>
                        <td>{{ $product->category->title}}</td>
                    </tr>
                    <tr>    
                        <th>Name :</th>
                        <td>{{ $product->title }}</td>
                    </tr> 
                    <tr>   
                        <th>Email :</th>
                        <td>{{ $product->description }}</td>
                    </tr>
                    <tr>    
                        <th>Phone :</th>
                        <td>{{ $product->cost_price }}</td>
                    </tr>
                    <tr>    
                        <th>Address :</th>
                        <td>{{ $product->price }}</td>
                    </tr>
                </table>
             </div>
        </div>
    </div>
</div>
@endsection
