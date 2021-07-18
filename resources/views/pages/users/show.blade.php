@extends('layouts.admin_layout')
@section('main_content')
<div class="row clearfix page_header">
    <div class="col-md-4 text-left">
        <a href="{{ route('users.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>Back</a>
    </div>
    <div class="col-md-8 text-right">
        <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Sale</a>
        <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Purchase</a>
        <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Payment</a>
        <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Recipt</a>
    </div>
</div>
<!-- Group Data Showing Here -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><strong>{{ $user->name }}</strong> User's Data</h6>
    </div>
    <div class="card-body">
        <div class="row clearfix justify-content-md-center">
             <div col-md-8>
                <table class="table table-striped">
                    <tr>
                        <th>Group :</th>
                        <td>{{ $user->group->title}}</td>
                    </tr>
                    <tr>    
                        <th>Name :</th>
                        <td>{{ $user->name }}</td>
                    </tr> 
                    <tr>   
                        <th>Email :</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>    
                        <th>Phone :</th>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>    
                        <th>Address :</th>
                        <td>{{ $user->address }}</td>
                    </tr>
                </table>
             </div>
        </div>
    </div>
</div>
@endsection
