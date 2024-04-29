<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    //
    public function legend(){
        return view('admin.pages.legend.table');
    }

    public function view_users(){
        $users = User::all();
        return view('admin.pages.user.table',compact('users'));
    }

    public function add_user(){
        return view('admin.pages.user.add');
    }

    public function edit_user($id){
        $user = User::find($id);
        return view('admin.pages.user.edit',compact('user'));
    }

    public function user_delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->withSuccess('Successfully Deleted');
    }

    public function add_user_process(Request $req)
    {
        $controlls=$req->all();
        $rules=array(
            "name"=>"required",
            "email"=>"required|email",
            "password"=>"required"
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            $user = new User;
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = bcrypt($req->password);
            $user->save();
            
            return redirect()->route('admin.user')->with(['success'=>"User Successfully Created"]);
        }
    }

    public function update_user_process(Request $req)
    {
        $controlls=$req->all();
        $rules=array(
            "name"=>"required",
            "email"=>"required|email"
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            $user = User::find($req->id);
            $user->name = $req->name;
            $user->email = $req->email;
            $user->save();
            
            return redirect()->route('admin.user')->with(['success'=>"User Successfully Updated"]);
        }
    }
}
