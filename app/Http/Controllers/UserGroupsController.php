<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class UserGroupsController extends Controller
{
    public function index()
    {
        $this->data['groups']=Group::all();
        return view ('pages.groups.group',$this->data);
    }

    public function create()
    {
        return view ('pages.groups.create');
    }
}
