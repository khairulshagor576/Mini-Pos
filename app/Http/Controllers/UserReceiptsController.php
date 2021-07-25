<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserReceiptsController extends Controller
{
    public function __construct()
    {
        $this->data['tab_menu']='receipts_active';
    }
    public function index($id)
    {
        $this->data['user']=User::findOrFail($id);
        return view('pages.users.receipts.receipts',$this->data);
    }
}
