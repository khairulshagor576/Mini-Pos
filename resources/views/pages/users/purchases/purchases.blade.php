@extends('pages.users.user_layout')
@section('user_content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Purchases of <strong>{{ $user->name }}</strong> Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20">Challan No</th>
                            <th width="80">Customer</th>
                            <th width="80">Date</th>
                            <th width="60">Total</th>
                            <th width="150" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th width="20">Challan No</th>
                            <th width="80">Customer</th>
                            <th width="80">Date</th>
                            <th width="60">Total</th>
                            <th width="150" class="text-center">Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($user->purchases as $purchase )
                        <tr>
                            <td>{{ $purchase->challan_no }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $purchase->date}}</td>
                            <td>100</td>
                            <td class="text-center">
                                <form action="{{ url('users/'.$user->id) }}" method="POST">
                                <a href="{{ route('users.show',[$user->id]) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>    
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
