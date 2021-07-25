<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
}
