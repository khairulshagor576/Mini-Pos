@extends('layouts.admin_layout')
@section('main_content')
<div class="row clearfix page_header">
    <div class="col-md-6">
        <h2>User Group</h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ route('admin.group.create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Group</a>
    </div>
</div>
<!-- Group Data Showing Here -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">User Group Table</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($groups as $group )
                    <tr>
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->title }}</td>
                        <td class="text-right">
                            <form action="{{ route('admin.group.delete',[$group->id]) }}" method="POST">
                             @csrf
                             @method('DELETE')
                             <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                            </form>
                            {{-- <a href="" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</a> --}}
                            {{-- <a href="{{ route('admin.group.delete',[$group->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
