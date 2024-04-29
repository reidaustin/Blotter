<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;
use Hash;


class ProfileController extends Controller
{
    //
    public function change_password()
    {
        return view('user.auth.change_password');
    }

    public function changepassword_process(Request $request)
    {
        $controlls = $request->all();
        $rules = array(
            "new_password" => "required|min:8",
            "confirm_password" => "required|same:new_password",
            "current_password" => "required"
        );
        //dd($controlls);
        $validator = Validator::make($controlls, $rules);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput($controlls);
        } else {
            $current_password = Auth::user()->password;
            if (Hash::check($request->current_password, $current_password)) {
                $user_id = Auth::user()->id;
                $obj_user = User::find($user_id);
                $obj_user->password = bcrypt($request->new_password);
                $obj_user->save();
            } else {
                return redirect()->back()->withErrors(["current_password" => 'Current Password Not Matched...!']);
            }

            return redirect()->back()->withSuccess('Password Successfully Updated');
        }
    }
}
