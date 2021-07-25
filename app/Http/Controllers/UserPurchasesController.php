<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserPurchasesController extends Controller
{
    public function __construct()
    {
        $this->data['tab_menu']='purchases_active';
    }
    public function index($id)
    {
        $this->data['user']=User::findOrFail($id);
        return view('pages.users.purchases.purchases',$this->data);
    }
}
