<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentsRequest;
use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPaymentsController extends Controller
{
    public function __construct()
    {
        $this->data['tab_menu']='payments_active';
    }
    public function index($id)
    {
        $this->data['user']=User::findOrFail($id);
        return view('pages.users.payments.payments',$this->data);
    }

    public function store(PaymentsRequest $request, $id)
    {
        $formData = $request->all();
        $formData['user_id']=$id;
        $formData['admin_id']=Auth::id();
        if(Payment::create($formData))
        {
            return redirect()->route('user.payments',['id'=>$id])->with('success','Payment is Saved Successfully');
        }
    }

    public function destroy($id,$payment_id)
    {
        if(Payment::destroy($payment_id))
        {
            return redirect()->route('user.payments',['id'=>$id])->with('success','Payment is Deleted Successfully');
        }
    }
}
