@extends('layouts.admin_layout')
@section('main_content')
<div class="row clearfix page_header">
    <div class="col-md-4 text-left">
        <a href="{{ route('users.index') }}" class="btn btn-info"><i class="fas fa-arrow-left"></i>Back</a>
    </div>
    <div class="col-md-8 text-right">
        <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Sale</a>
        <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Purchase</a>
        <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Payment</a>
        <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i>New Recipt</a>
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
@endsection
