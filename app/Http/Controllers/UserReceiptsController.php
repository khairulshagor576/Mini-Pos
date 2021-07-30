<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptRequest;
use App\Receipt;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReceiptsController extends Controller
{
    /*
      This function is taken for button active:
    */
    public function __construct()
    {
        $this->data['tab_menu']='receipts_active';
    }

    public function index($id)
    {
        $this->data['user']=User::findOrFail($id);
        return view('pages.users.receipts.receipts',$this->data);
    }

    public function store(ReceiptRequest $request, $user_id)
    {
        $formData=$request->all();
        $formData['user_id']=$user_id;
        $formData['admin_id']=Auth::id();

        if(Receipt::create($formData))
        {
            return redirect()->route('user.receipts',['id'=>$user_id])->with('success','Receipt is added Successfully');
        }

    }

    public function destroy($user_id,$receipt_id)
    {
        if(Receipt::destroy($receipt_id))
        {
            return redirect()->route('user.receipts',['id'=>$user_id])->with('success','Receipt is Deleted Successfully');
        }
    }
}
