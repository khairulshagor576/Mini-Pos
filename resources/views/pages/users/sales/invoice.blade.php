@extends('pages.users.user_layout')
@section('user_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sale Invoice Details</h6>
    </div>
    <div class="card-body">
        <div class="row clearfix justify-content-md-center">
                <div class="col-md-6">
                    <div><strong>Cutomer :</strong> {{ $user->name }}</div>
                    <div><strong>Email :</strong> {{ $user->email }}</div>
                    <div><strong>Phone :</strong> {{ $user->phone }}</div>
                </div>
                <div class="col-md-3">
                    <div><strong>Date :</strong> {{ $invoice->date }}</div>
                    <div><strong>Challan No :</strong> {{ $invoice->challan_no }}</div>
                </div>
        </div>
        <div class="invoice_items">
            <table class="table">
                <thead>
                       <tr>
                           <th>SL</th>
                           <th>Product</th>
                           <th>Price</th>
                           <th>Quntity</th>
                           <th>Total</th>
                           <th>Action</th>
                       </tr>
                </thead>
                <tbody>
                    @foreach ($invoice->items as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->product->title }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->total }}</td>
                            <td class="text-center">
                                <form action="{{ route('user.sales.delete_item',["id"=>$user->id,"invoice_id"=>$invoice->id,"item_id"=>$item->id]) }}" method="POST">   
                                 @csrf
                                 @method('DELETE')
                                 <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#newProduct">
                                <i class="fa fa-plus"></i>Add Prodcuct
                            </button>
                        </th>
                        <th colspan="2">Total</th>
                        <th>{{ $invoice->items->sum('total') }}</th>
                        <th></th>
                    </tr>
             </tfoot>
            </table>
        </div>
    </div>
</div>

{{-- added new porduct modal --}}
<div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('user.sales.additems',["id"=>$user->id,"invoice_id"=>$invoice->id]) }}">
     @csrf  
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newProductModalLabel">Add New Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Products<span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <select class="form-control" required name="product_id">
                        <option value="">Select Product</option>
                        @foreach ($products as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                </select>
              </div>      
            </div>
            <div class="form-group row">
              <label for="price" class="col-sm-2 col-form-label" >Unite Price<span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
              </div>
          </div>
          <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">Quantity<span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" required>
            </div>
        </div>
        <div class="form-group row">
          <label for="total" class="col-sm-2 col-form-label">Total<span class="text-danger">*</span></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="total" id="total" placeholder="Total" required>
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