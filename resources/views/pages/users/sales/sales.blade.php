@extends('pages.users.user_layout')
@section('user_content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sales of <strong>{{ $user->name }}</strong> Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20">Challan No</th>
                            <th width="80">Customer</th>
                            <th width="80">Date</th>
                            <th width="60">Items</th>
                            <th width="60">Total</th>
                            <th width="150" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $grandQuantity=0;
                            $grandTotal=0;
                        ?>
                        @foreach ($user->sales as $sale )
                        <tr>
                            <td>{{ $sale->challan_no }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $sale->date}}</td>
                            <td>
                                <?php
                                     $totalquantity =$sale->items->sum('quantity');
                                     $grandQuantity+= $totalquantity;
                                     echo  $totalquantity;
                                ?>
                            </td>
                            <td>
                                <?php
                                     $totalamount =$sale->items->sum('total');
                                     $grandTotal+= $totalamount;
                                     echo  $totalamount;
                                ?>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('user.sales.invoice_delete',['id'=>$user->id,'invoice_id'=>$sale->id]) }}" method="POST">
                                <a href="{{ route('user.sales.invoice_details',['id'=>$user->id,'invoice_id'=>$sale->id]) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a> 
                                @if ($totalquantity==0)  
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                 @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="20">Challan No</th>
                            <th width="80">Customer</th>
                            <th width="80">Date</th>
                            <th width="60">{{ $grandQuantity }}</th>
                            <th width="60">{{ $grandTotal }}</th>
                            <th width="150" class="text-center">Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
