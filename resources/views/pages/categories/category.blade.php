@extends('layouts.admin_layout')
@section('main_content')
<div class="row clearfix page_header">
    <div class="col-md-6">
        <h2>Categories</h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ route('categories.create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Category</a>
    </div>
</div>
<!-- Group Data Showing Here -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Category's Data</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($categories as $category )
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td class="text-center">
                            <form action="{{ route('categories.destroy',$category->id) }}" method="POST">  
                            <a href="{{ route('categories.edit',[$category->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>  
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
