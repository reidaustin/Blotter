<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class RegisterController extends Controller
{
    //
    public function officer_register(){
        return view('user.auth.register');
    }

    public function officer_register_process(Request $req)
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
            
            return redirect()->route('login')->with(['success'=>"User Successfully Registered"]);
        }
    }
}
