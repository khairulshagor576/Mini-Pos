@extends('pages.users.user_layout')
@section('user_content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Payments of <strong>{{ $user->name }}</strong> Data</h6>
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
                            <th width="60" class="text-right">{{ $user->payments->sum('amount') }}</th>
                            <th colspan="2"></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($user->payments as $payment )
                        <tr>
                            <td>{{ optional($payment->admin)->name}}</td>
                            <td>{{ $payment->date}}</td>
                            <td class="text-right">{{ $payment->amount}}</td>
                            <td>{{ $payment->note}}</td>
                            <td class="text-center">
                                <form action="{{ route('user.payments.destroy',['id'=>$user->id,'payment_id'=>$payment->id]) }}" method="POST">   
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
    <!-- Button trigger modal --> 
@endsection
