<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\TourCommander;
use App\Models\Supervisor;
use App\Models\Officer;
use App\Models\TourOfficer;
use App\Models\TourRadio;
use App\Models\TourPost;
use App\Models\DailyBlotter;
use Validator;
use DB;
use App\Exports\ToursExport;
use Maatwebsite\Excel\Facades\Excel;




class TourController extends Controller
{
    //
    public function export()
    {
        return Excel::download(new ToursExport, 'tours.xlsx');
    }

    public function locked_tour(){
        $tours = Tour::with('blotter','tour_commander','supervisor','officer')->get();
        // dd($tours);
        return view('admin.pages.tour.locked_tours',compact('tours'));
    }

    public function view_tour(){
        $tours = Tour::withCount('blotter','tour_commander','supervisor','officer')->get();
        // dd($tours);
        return view('admin.pages.tour.table',compact('tours'));
    }

    public function view_tour_there_incidient(Request $request){
        $tours = Tour::withCount([
            'blotter','tour_commander','supervisor','officer',
            'blotter as mds_count' => fn($q) => $q->where('incident_type_id', '2'),
            'blotter as esc_count' => fn($q) => $q->where('incident_type_id', '3'),
            'blotter as med_count' => fn($q) => $q->where('incident_type_id', '4'),
            'blotter as rest_count' => fn($q) => $q->where('incident_type_id', '5'),
            'blotter as vis_count' => fn($q) => $q->where('incident_type_id', '6'),
            'blotter as sp_count' => fn($q) => $q->where('incident_type_id', '7'),
            'blotter as assault_count' => fn($q) => $q->where('incident_type_id', '8'),
            'blotter as mta_count' => fn($q) => $q->where('incident_type_id', '9'),
            'blotter as vis_inj_count' => fn($q) => $q->where('incident_type_id', '10'),
            'blotter as arrest_count' => fn($q) => $q->where('incident_type_id', '11'),
            'blotter as heli_count' => fn($q) => $q->where('incident_type_id', '12'),
            'blotter as code_red_count' => fn($q) => $q->where('incident_type_id', '13'),
            'blotter as elope_count' => fn($q) => $q->where('incident_type_id', '14'),
            'blotter as elev_count' => fn($q) => $q->where('incident_type_id', '15'),
            'blotter as disch_count' => fn($q) => $q->where('incident_type_id', '16'),
            'blotter as ev_count' => fn($q) => $q->where('incident_type_id', '17'),
            'blotter as evot_count' => fn($q) => $q->where('incident_type_id', '18'),
            'blotter as stat_count' => fn($q) => $q->where('incident_type_id', '19'),
            'blotter as otp_count' => fn($q) => $q->where('incident_type_id', '20'),
            'blotter as sick_count' => fn($q) => $q->where('incident_type_id', '21'),
            'blotter as aid_count' => fn($q) => $q->where('incident_type_id', '22'),
            'blotter as bert_count' => fn($q) => $q->where('incident_type_id', '23'),
            'blotter as distb_count' => fn($q) => $q->where('incident_type_id', '24'),
            'blotter as detox_count' => fn($q) => $q->where('incident_type_id', '25'),
            'blotter as inj_count' => fn($q) => $q->where('incident_type_id', '26'),
            'blotter as door_count' => fn($q) => $q->where('incident_type_id', '27'),
            'blotter as fl_count' => fn($q) => $q->where('incident_type_id', '28'),
        ])
        ->with('blotter','officer','tour_commander','supervisor','tour_radio','tour_post','tour_officer')
        ->whereBetween('created_at', [$request->get('from'), $request->get('till')])
        ->orderBy('id','ASC')
        ->get();

        // dd($tours);
        return view('admin.pages.tour.tour_own_incidient',compact('tours'));
    }

    public function add_tour(){
        $commanders = TourCommander::all();
        $supervisors = Supervisor::all();
        $officers = Officer::all();
        return view('admin.pages.tour.add',compact('commanders','supervisors','officers'));
    }

    public function edit_tour($id){
        $tour = Tour::with('tour_radio','tour_post','tour_officer')->find($id);
        $tour_officers = Officer::with('tour_officer')
        ->whereRelation('tour_officer', 'tour_id', $tour->id)->get();
        // dd($tour);
        $commanders = TourCommander::all();
        $supervisors = Supervisor::all();
        $officers = Officer::all();
        return view('admin.pages.tour.edit',compact('tour','commanders','supervisors','officers','tour_officers'));
    }

    public function tour_delete($id){
        $tour = Tour::find($id);
        $tour->delete();
        return response()->json(['success'=>'Record has been deleted']);
    }

    public function store_tour(Request $req)
    {
        $controlls=$req->all();
        $rules=array(
            "tour_date"=>"required",
            "tour_name"=>"required",
            "weather"=>"required",
            "road_condition"=>"required",
            // "gate_cards"=>"required",
            // "gas_cards"=>"required",
            // "ct_key"=>"required",
            // "supervisor_key"=>"required",
            "vehicle_1"=>"required",
            "vehicle_2"=>"required",
            "vehicle_3"=>"required",
            "vehicle_4"=>"required",
            //"vehicle_5"=>"required",
            //"vehicle_6"=>"required",
            //"petrol_man"=>"required",
            //"radio"=>"required",
            "comment"=>"required"
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            $tour = new Tour;
            $tour->tour_commander_id = $req->tour_commander_id;
            $tour->supervisor_id = $req->supervisor_id;
            $tour->tour_date = $req->tour_date;
            $tour->tour_name = $req->tour_name;
            $tour->weather = $req->weather;
            $tour->road_condition = $req->road_condition;
            $tour->fob_1 = $req->fob_1;
            $tour->fob_2 = $req->fob_2;
            $tour->fob_3 = $req->fob_3;
            $tour->fob_4 = $req->fob_4;
            $tour->ring_1 = $req->ring_1;
            $tour->ring_2 = $req->ring_2;
            $tour->ring_3 = $req->ring_3;
            $tour->ring_4 = $req->ring_4;
            $tour->vehicle_1 = $req->vehicle_1;
            $tour->vehicle_2 = $req->vehicle_2;
            $tour->vehicle_3 = $req->vehicle_3;
            $tour->vehicle_4 = $req->vehicle_4;
            $tour->created_at = $req->tour_date;
            $tour->comment = $req->comment;
            //$tour->vehicle_6 = $req->vehicle_6;
            //$tour->officer_id = json_encode($req->officer_id);
            //$tour->radio = json_encode($req->radio);
            //$tour->post = json_encode($req->post);
            $tour->save();

            $countofficer=count($req->officer_id);
            for($i=0; $i<$countofficer; $i++){
                $service= new TourOfficer();
                $service->tour_id = $tour->id;
                $service->officer_id = $req->officer_id[$i];
                $service->save();
            }

            $countradio=count($req->radio);
            for($i=0; $i<$countradio; $i++){
                $service= new TourRadio();
                $service->tour_id = $tour->id;
                $service->radio = $req->radio[$i];
                $service->save();
            }

            $countpost=count($req->post);
            for($i=0; $i<$countpost; $i++){
                $service= new TourPost();
                $service->tour_id = $tour->id;
                $service->post = $req->post[$i];
                $service->save();
            }

            return redirect()->route('admin.tour')->with(['success'=>"Tour Successfully Created"]);
        }
    }

    public function update_tour(Request $req)
    {
        $controlls=$req->all();
        $rules=array(
            "tour_date"=>"required",
            "tour_name"=>"required",
            "weather"=>"required",
            "road_condition"=>"required",
            // "gate_cards"=>"required",
            // "gas_cards"=>"required",
            // "ct_key"=>"required",
            // "supervisor_key"=>"required",
            "vehicle_1"=>"required",
            "vehicle_2"=>"required",
            "vehicle_3"=>"required",
            "vehicle_4"=>"required",
            "comment"=>"required"
            //"vehicle_6"=>"required",
            //"petrol_man"=>"required",
            //"radio"=>"required",
            //"post"=>"required"
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            $tour = Tour::find($req->id);
            $tour->tour_commander_id = $req->tour_commander_id;
            $tour->supervisor_id = $req->supervisor_id;
            $tour->tour_date = $req->tour_date;
            $tour->tour_name = $req->tour_name;
            $tour->weather = $req->weather;
            $tour->road_condition = $req->road_condition;
            $tour->fob_1 = $req->fob_1;
            $tour->fob_2 = $req->fob_2;
            $tour->fob_3 = $req->fob_3;
            $tour->fob_4 = $req->fob_4;
            $tour->ring_1 = $req->ring_1;
            $tour->ring_2 = $req->ring_2;
            $tour->ring_3 = $req->ring_3;
            $tour->ring_4 = $req->ring_4;
            $tour->vehicle_1 = $req->vehicle_1;
            $tour->vehicle_2 = $req->vehicle_2;
            $tour->vehicle_3 = $req->vehicle_3;
            $tour->vehicle_4 = $req->vehicle_4;
            $tour->comment = $req->comment;
            //$tour->vehicle_6 = $req->vehicle_6;
            // $tour->officer_id = $req->officer_id;
            // $tour->radio = $req->radio;
            // $tour->post = $req->post;
            $tour->save();

            $countofficer=count($req->officer_id);
            TourOfficer::where('tour_id',$tour->id)->delete();

            for($i=0; $i<$countofficer; $i++){
                $service= new TourOfficer();
                $service->tour_id = $tour->id;
                $service->officer_id = $req->officer_id[$i];
                $service->save();
            }

            $countradio=count($req->radio);
            TourRadio::where('tour_id',$tour->id)->delete();

            for($i=0; $i<$countradio; $i++){
                $service= new TourRadio();
                $service->tour_id = $tour->id;
                $service->radio = $req->radio[$i];
                $service->save();
            }

            $countpost=count($req->post);
            TourPost::where('tour_id',$tour->id)->delete();

            for($i=0; $i<$countpost; $i++){
                $service= new TourPost();
                $service->tour_id = $tour->id;
                $service->post = $req->post[$i];
                $service->save();
            }

            return redirect()->route('admin.tour')->with(['success'=>"Tour Successfully Updated"]);
        }
    }
}
