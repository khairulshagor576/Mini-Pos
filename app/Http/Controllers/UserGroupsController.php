<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

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

    public function store(Request $request)
    {
        $formdata = $request->all();
        Group::create($formdata);

        return redirect()->route('admin.group')->with('success','Group User Created Successfully');
    }

    public function destroy($id)
    {
      Group::find($id)->delete();

      return redirect()->route('admin.group')->with('success','Group User Deleted Successfully'); 
    }
}
