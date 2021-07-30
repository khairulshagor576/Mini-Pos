@extends('layouts.admin_layout')
@section('main_content')
<div class="row clearfix page_header">
    <div class="col-md-4 text-left">
        <a href="{{ route('users.index') }}" class="btn btn-info"><i class="fas fa-arrow-left"></i>Back</a>
    </div>
    <div class="col-md-8 text-right">
        <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Sale</a>
        <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Purchase</a>
        {{-- <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Payment</a> --}}
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment">
            <i class="fa fa-plus"></i>New Payment
        </button>
        {{-- <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Recipt</a> --}}
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newReceipt">
            <i class="fa fa-plus"></i>New Receipt
        </button>
    </div>
</div>

<div class="row clearfix">
   <div class="col-md-2">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link @if ($tab_menu=='users_active') active @endif " href="{{ route('users.show',$user->id) }}">User Info</a>
        <a class="nav-link @if ($tab_menu=='sales_active') active @endif " href="{{ route('user.sales',$user->id) }}">Sales</a>
        <a class="nav-link @if ($tab_menu=='purchases_active') active @endif " href="{{ route('user.purchases',$user->id)  }}">Purchases</a>
        <a class="nav-link @if ($tab_menu=='payments_active') active @endif " href="{{ route('user.payments',$user->id)  }}">Payments</a>
        <a class="nav-link @if ($tab_menu=='receipts_active') active @endif " href="{{ route('user.receipts', $user->id) }}">Recipts</a>
      </div>
   </div>
   <div class="col-md-10">
    @yield('user_content')
   </div>
</div>

<!-- Modal for Payment -->
<div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="newPaymentModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('user.payments.store',[$user->id]) }}">
     @csrf  
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newPaymentModalLabel">New Payment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
            <label for="date" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="date" id="date" placeholder="Date" required>
            </div>      
            </div>
            <div class="form-group row">
              <label for="amount" class="col-sm-2 col-form-label">Amount</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" required>
              </div>
          </div>
          <div class="form-group row">
            <label for="note" class="col-sm-2 col-form-label">Note</label>
            <div class="col-sm-10">
              <textarea type="text" class="form-control" name="note"></textarea>
            </div>
        </div>         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary ">Submit</button>
        </div>
      </div>
    </div>
  </form>
  </div>
  
 <!-- Modal for Receipt -->
 <div class="modal fade" id="newReceipt" tabindex="-1" role="dialog" aria-labelledby="newReceiptModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('user.receipts.store',[$user->id]) }}">
     @csrf  
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newReceiptModalLabel">New Receipt</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
            <label for="date" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="date" id="date" placeholder="Date" required>
            </div>      
            </div>
            <div class="form-group row">
              <label for="amount" class="col-sm-2 col-form-label">Amount</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" required>
              </div>
          </div>
          <div class="form-group row">
            <label for="note" class="col-sm-2 col-form-label">Note</label>
            <div class="col-sm-10">
              <textarea type="text" class="form-control" name="note"></textarea>
            </div>
        </div>         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary ">Submit</button>
        </div>
      </div>
    </div>
  </form>
  </div>
@endsection
