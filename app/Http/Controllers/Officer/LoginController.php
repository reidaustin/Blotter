<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;

class LoginController extends Controller
{
    //
    public function officer_login(){
        return view('user.auth.login');
    }

    public function officer_dasboard(){
        return view('user.pages.dashboard');
    }

    public function attempt(Request $request)
    {
        $controlls=$request->all();
        $rules=array(
            "email"=>"required|exists:users,email",
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
                if (!Auth::attempt($credientials)) {
            return redirect()->route('login')->withErrors(['error'=>"Invalid Credientials"]);
                }else{
            return redirect()->route('tour');
                }
            }
        }

        public function logout()
        {
            Auth::logout();
            return redirect()->route('login');
        }
}
