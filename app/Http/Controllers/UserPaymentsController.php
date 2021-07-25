<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
}
