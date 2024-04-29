<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;

class LoginController extends Controller
{
    //
    public function login(){
        return view('admin.auth.login');
    }

    public function dashboard(){
        return view('admin.pages.dashboard');
    }

    public function attempt(Request $request)
    {
        $controlls=$request->all();
        $rules=array(
            "email"=>"required|exists:admins,email",
            "password"=>"required");
            $messages=array(
                "email.exists"=>"Email Does Not Exists",
            );
            $validator=Validator::make($controlls,$rules,$messages);
            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput($controlls);
            }
            else{
                $credientials=['email'=>$request->email,'password'=>$request->password];
                if (!Auth::guard('admin')->attempt($credientials)) {
            return redirect()->route('admin.login')->withErrors(['error'=>"Invalid Credientials"]);
                }else{
            return redirect()->route('admin.tour');
                }
            }
        }

        public function logout()
        {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        }
}
