<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceProductRequest;
use App\Http\Requests\InvoiceRequest;
use App\Product;
use App\SaleInvoice;
use App\SaleItems;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSalesController extends Controller
{
    public function __construct()
    {
        $this->data['tab_menu']='sales_active';
    }
    public function index($id)
    {
        $this->data['user']=User::findOrFail($id);
        return view('pages.users.sales.sales',$this->data);
    }

    public function store(InvoiceRequest $request,$user_id)
    {
        $formData=$request->all();
        $formData['user_id']=$user_id;
        $formData['admin_id']=Auth::id();

       $invoice = SaleInvoice::create($formData);
        
        return redirect()->route('user.sales.invoice_details',['id'=>$user_id,'invoice_id'=>$invoice->id]);

    }

    public function destroyInvoice($user_id,$invoice_id)
    {
        if(SaleInvoice::destroy($invoice_id))
        {
            return redirect()->route('user.sales.invoice_details',['id'=>$user_id])->with('success','Sale Item is Delete Successfully');
        }
    }

    public function invoice($user_id,$invoice_id)
    {
      $this->data['invoice']=SaleInvoice::findOrFail($invoice_id);
      $this->data['user']=User::findOrFail($user_id);
      $this->data['products']=Product::ProductListArray();

      return view('pages.users.sales.invoice',$this->data);
    }

    public function addItems(InvoiceProductRequest $request, $user_id,$invoice_id)
    {
      $formData= $request->all();
      $formData['sale_invoice_id']=$invoice_id;

      if(SaleItems::create($formData))
        {
            return redirect()->route('user.sales.invoice_details',['id'=>$user_id,'invoice_id'=>$invoice_id])->with('success','Sale Item is added Successfully');
        }
    }

    public function destroyItem($user_id,$invoice_id,$item_id)
    {
        if(SaleItems::destroy($item_id))
        {
            return redirect()->route('user.sales',['id'=>$user_id,'invoice_id'=>$invoice_id])->with('success','Sale Item is Delete Successfully');
        }
    }

    public function destroy($user_id,$invoice_id)
    {
        if(SaleInvoice::destroy($invoice_id))
        {
            return redirect()->route('user.sales',['id'=>$user_id])->with('success','Sale Item is Delete Successfully');
        }
    }
}
