@extends('layouts.admin_layout')
@section('main_content')
<h2>Update <strong>{{ $user->name }}</strong> Information</h2>
<!-- Group Data Showing Here -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create New User</h6>
    </div>
    <div class="card-body">
       <div class="row justify-content-md-center">
            <div class="col-md-8">
                <form method="POST" action="{{ url('users',$user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="admin_id" class="col-sm-2 col-form-label">Admin</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="admin_id" id="admin_id" value="{{ $user->admin_id }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Group<span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                          <select class="form-control" name="group_id">
                                  <option value="">Select Group</option>
                                  @foreach ($groups as $key => $value)
                                    @if($user->group_id==$key)
                                    <option selected value="{{ $user->group_id }}">{{ $value }}</option>
                                    @endif
                                  @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name<span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone<span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="phone" id="phone" value="{{ $user->phone }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <textarea type="text" class="form-control" name="address">{{ $user->address }}</textarea>
                        </div>
                    </div>    
                    <div class="mt-4 text-right">    
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                    </form>
            </div>
       </div>
    </div>
</div>
@endsection
