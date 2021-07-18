@extends('layouts.admin_layout')
@section('main_content')
<div class="row clearfix page_header">
    <div class="col-md-6">
        <h2>User</h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New User</a>
    </div>
</div>
<!-- Group Data Showing Here -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All User's Data</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="20">ID</th>
                        <th width="20">Admin</th>
                        <th width="50">Group</th>
                        <th width="100">Name</th>
                        <th width="100">Email</th>
                        <th width="100">Phone</th>
                        <th width="100">Address</th>
                        <th width="150" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th width="20">ID</th>
                        <th width="20">Admin</th>
                        <th width="50">Group</th>
                        <th width="100">Name</th>
                        <th width="100">Email</th>
                        <th width="100">Phone</th>
                        <th width="100">Address</th>
                        <th width="150" class="text-center">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $user )
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->admin_id }}</td>
                        <td>{{ $user->group->title}}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td class="text-center">
                            <form action="{{ url('users/'.$user->id) }}" method="POST">
                            <a href="{{ route('users.show',[$user->id]) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>  
                            <a href="{{ route('users.edit',[$user->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>  
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
