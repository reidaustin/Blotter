<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlotterComment;
use App\Models\DailyBlotter;
use Validator;

class BlotterCommentController extends Controller
{
    //
    public function view_comments($id){
        $blotter_comments = DailyBlotter::with('comments')
        ->where('id',$id)->first();
        // dd($blotter_comments);
        return view('admin.pages.dailyblooter.view_comments',compact('blotter_comments'));
    }

    public function blotter_comment_store(Request $req)
    {
        $controlls=$req->all();
        // dd($controlls);
        $rules=array(
            "comment"=>"required"
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            $comment = new BlotterComment;
            $comment->blotter_id = $req->blotter_id;
            $comment->comment = $req->comment;
            $comment->time = $req->time;
            $comment->save();

            return redirect()->back()->with(['success'=>"Blotter Comment Successfully Created"]);
        }
    }
}
