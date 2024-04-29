<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Officer;
use Validator;

class OfficerController extends Controller
{
    //
    public function view_officer(){
        $officers = Officer::all();
        return view('admin.pages.officer.table',compact('officers'));
    }
    
    public function add_officer(){
        return view('admin.pages.officer.add');
    }

    public function edit_officer($id){
        $officer = Officer::find($id);
        return view('admin.pages.officer.edit',compact('officer'));
    }

    public function delete_officer($id){
        $officer = Officer::find($id);
        $officer->delete();
        return redirect()->back()->withSuccess('Successfully Deleted');
    }

    public function store_officer(Request $req)
    {
        $controlls=$req->all();
        // dd($controlls);
        $rules=array(
            "full_name"=>"required",
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            $officer = new Officer;
            $officer->full_name = $req->full_name;
            $officer->save();
            
            return redirect()->route('admin.officer')->with(['success'=>"Officer Successfully Created"]);
        }
    }

    public function update_officer(Request $req)
    {
        $controlls=$req->all();
        // dd($controlls);
        $rules=array(
            "full_name"=>"required",
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            $officer = Officer::find($req->id);
            $officer->full_name = $req->full_name;
            $officer->save();
            
            return redirect()->route('admin.officer')->with(['success'=>"Officer Successfully Updated"]);
        }
    }
}
