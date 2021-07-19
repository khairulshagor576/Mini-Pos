<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpadateUserRequest;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users']= User::all();
        return view('pages.users.user',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['groups'] = Group::groupListArray ();      
        return view('pages.users.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
       // return $request->all();

        $data = $request->all();
        if(User::create($data))
        {
            return redirect()->to('users')->with('success','User Data is Saved Successfully');
        }
    }

    public function show ($id)
    {
      $this->data['user']=User::find($id);
      $this->data['group'] = Group::groupListArray ();

      return view('pages.users.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['user']   = User::findOrFail($id);
        $this->data['groups'] = Group::groupListArray ();

        return view('pages.users.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpadateUserRequest $request, $id)
    {
        $data = $request->all();

        $user = User::find($id);
        $user->admin_id  = $data['admin_id'];
        $user->group_id  = $data['group_id'];
        $user->name      = $data['name'];
        $user->email     = $data['email'];
        $user->phone     = $data['phone'];
        $user->address   = $data['address'];
        $user->save();

        return redirect()->to('users')->with('success','User Data is Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = User::find($id);
       $data->delete();

       return redirect()->to('users')->with('success','User Data is Deleted Successfully');

    }
}
