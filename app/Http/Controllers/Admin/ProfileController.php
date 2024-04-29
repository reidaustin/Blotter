<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Validator;

class ProfileController extends Controller
{
    //
    public function profile(){
        return view('admin.auth.profile');
    }

    public function updateAdminProfile(Request $req)
    {
        $controlls=$req->all();
        $rules=array(
            "name"=>"required",
            "email"=>"required",
            "image"=>"nullable|image"
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
        $updateadmin=Admin::find(Auth::guard('admin')->user()->id);
        $updateadmin->name = $req->input('name');
        $updateadmin->email =$req->input('email');

        if ($req->hasFile('image')) {
            $file=$req->file('image');
            $filename=$file->getClientOriginalName();
            $path=public_path("/uploads/admins/profile/");
            $file->move($path,$filename);
            $updateadmin->image =$filename;
            }
        $updateadmin->save();

        return redirect()->back()->withSuccess('Admin Profile Updated Successfully');
        }
    }
}
