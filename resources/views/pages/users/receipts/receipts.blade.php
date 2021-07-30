@extends('pages.users.user_layout')
@section('user_content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Receipts of <strong>{{ $user->name }}</strong> Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="80">Admin</th>
                            <th width="80">Date</th>
                            <th width="60">Total</th>
                            <th width="60">Note</th>
                            <th width="150" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="2" class="text-center">Total</th>
                            <th width="60">{{ $user->receipts->sum('amount') }}</th>
                            <th colspan="2"></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($user->receipts as $receipt )
                        <tr>
                            <td>{{ optional($receipt->admin)->name}}</td>
                            <td>{{ $receipt->date}}</td>
                            <td>{{ $receipt->amount}}</td>
                            <td>{{ $receipt->note}}</td>
                            <td class="text-center">
                                <form action="{{ route('user.receipts.destroy',['id'=>$user->id,'receipt_id'=>$receipt->id]) }}" method="POST">  
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
