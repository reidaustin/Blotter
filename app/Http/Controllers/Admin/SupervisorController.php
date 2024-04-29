<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supervisor;
use Validator;

class SupervisorController extends Controller
{
    //
    public function view_supervisor(){
        $supervisors = Supervisor::all();
        return view('admin.pages.Supervisor.table',compact('supervisors'));
    }
    
    public function add_supervisor(){
        return view('admin.pages.Supervisor.add');
    }

    public function edit_supervisor($id){
        $supervisor = Supervisor::find($id);
        return view('admin.pages.Supervisor.edit',compact('supervisor'));
    }

    public function delete_supervisor($id){
        $supervisor = Supervisor::find($id);
        $supervisor->delete();
        return redirect()->back()->withSuccess('Successfully Deleted');
    }

    public function store_supervisor(Request $req)
    {
        $controlls=$req->all();
        // dd($controlls);
        $rules=array(
            "name"=>"required",
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            $supervisor = new Supervisor;
            $supervisor->name = $req->name;
            $supervisor->save();
            
            return redirect()->route('admin.supervisor')->with(['success'=>"Supervisor Successfully Created"]);
        }
    }

    public function update_supervisor(Request $req)
    {
        $controlls=$req->all();
        // dd($controlls);
        $rules=array(
            "name"=>"required",
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            $supervisor = Supervisor::find($req->id);
            $supervisor->name = $req->name;
            $supervisor->save();
            
            return redirect()->route('admin.supervisor')->with(['success'=>"Supervisor Successfully Updated"]);
        }
    }
}
