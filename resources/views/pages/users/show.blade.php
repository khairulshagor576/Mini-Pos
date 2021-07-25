@extends('pages.users.user_layout')
@section('user_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><strong>{{ $user->name }}</strong> Data</h6>
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