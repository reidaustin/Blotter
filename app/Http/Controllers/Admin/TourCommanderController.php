<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourCommander;
use Validator;

class TourCommanderController extends Controller
{
    //
    public function view_commander(){
        $commanders = TourCommander::all();
        return view('admin.pages.TourCommander.table',compact('commanders'));
    }
    
    public function add_commander(){
        return view('admin.pages.TourCommander.add');
    }

    public function edit_commander($id){
        $commander = TourCommander::find($id);
        return view('admin.pages.TourCommander.edit',compact('commander'));
    }

    public function delete_commander($id){
        $commander = TourCommander::find($id);
        $commander->delete();
        return redirect()->back()->withSuccess('Successfully Deleted');
    }

    public function store_commander(Request $req)
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
            $commander = new TourCommander;
            $commander->name = $req->name;
            $commander->save();
            
            return redirect()->route('admin.commander')->with(['success'=>"Commander Successfully Created"]);
        }
    }

    public function update_commander(Request $req)
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
            $commander = TourCommander::find($req->id);
            $commander->name = $req->name;
            $commander->save();
            
            return redirect()->route('admin.commander')->with(['success'=>"Commander Successfully Updated"]);
        }
    }
}
