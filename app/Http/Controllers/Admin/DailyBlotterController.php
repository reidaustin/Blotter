<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourCommander;
use App\Models\Supervisor;
use App\Models\Tour;
use App\Models\DailyBlotter;
use App\Models\Officer;
use App\Models\Area;
use App\Models\Building;
use App\Models\CodeAlarm;
use App\Models\Crime;
use App\Models\IncidentType;
use App\Models\JobFinal;
use App\Models\MedicalRequest;
use App\Models\Other;
use App\Models\ParkingLot;
use App\Models\PersonRequest;
use App\Models\BlotterComment;
use App\Models\SerialNumber;
use App\Models\SerialNumber2;
use App\Models\SerialNumber3;
use App\Models\TourOfficer;
use Validator;
use PDF;

class DailyBlotterController extends Controller
{
    //
    public function view_blotter(Request $request,$id){
        $tour = Tour::find($id);
        $blotters = DailyBlotter::with('officers','job','crime','comments')
        ->where('tour_id',$tour->id)->get();

        $blotter_comments = DailyBlotter::with('comments')
        ->where('id',$request->blotter_id)->get();
        // dd($blotters);
        return view('admin.pages.dailyblooter.table',compact('tour','blotters','blotter_comments'));
    }

    public function view_blotter_pdf(Request $request){
        $blotters = Tour::with('blotter','officer','tour_commander','supervisor','tour_radio','tour_post','tour_officer')
        ->where('id',$request->tour_id)->first();
        $tour_officers = TourOfficer::with('officer')
        ->where('tour_id', $blotters->id)->get();
        $blotter_offi = DailyBlotter::with('officers','job','crime','comments')
        ->where('tour_id',$blotters->id)->get();
        // dd($blotter_offi);

        $pdf = PDF::loadView('admin.pages.dailyblooter.pdf',compact('blotters','tour_officers','blotter_offi'));
        return $pdf->stream('blotter.pdf');
    }

    public function view_single_blotter_pdf(Request $request,$id){
        $blotter = DailyBlotter::with('tour','officers')->find($id);

        $blotters = Tour::with('tour_post','tour_officer','tour_radio')
        ->where('id',$blotter->tour_id)->first();

        $tour_officers = TourOfficer::with('officer')
        ->whereRelation('tour','id',$blotter->tour_id)->get();
        $blotter_offi = DailyBlotter::with('officers','job','crime','comments')
        ->where('tour_id',$blotter->tour_id)->get();
        // dd($blotters);

        $pdf = PDF::loadView('admin.pages.dailyblooter.single_pdf',compact('blotters','blotter','tour_officers','blotter_offi'));
        return $pdf->stream('blotter.pdf');
    }

    public function view_stat_pdf(Request $request){
        $blotters = Tour::with('blotter','officer','tour_commander','supervisor','tour_radio','tour_post','tour_officer')->where('id',$request->tour_id)->first();
        $tour_officers = TourOfficer::with('officer')
        ->where('tour_id', $request->tour_id)->get();
        // $blotter_offi = DailyBlotter::with('incident','officers','job','crime','comments')
        // ->whereDate('tour_date',$request->date)->get();
        $blotter_offi = Tour::withCount([
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
            'blotter as fl_count' => fn($q) => $q->where('incident_type_id', '28')

        ])->with('blotter','officer','tour_commander','supervisor','tour_radio','tour_post','tour_officer')
        ->whereBetween('created_at', [$request->get('from'), $request->get('till')])
        ->orderBy('id','ASC')->get();
        $blotter_offi = $blotter_offi->groupBy('tour_name');

        // dd($blotter_offi);

        $mds_count = DailyBlotter::with('incident')
        ->where('incident_type_id', '2')->sum('incident_type_id');

        $esc_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','3')->sum('incident_type_id');

        $med_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','4')->sum('incident_type_id');

        $rest_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','5')->sum('incident_type_id');

        $vis_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','6')->sum('incident_type_id');

        $sp_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','7')->sum('incident_type_id');

        $assault_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','8')->sum('incident_type_id');

        $mta_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','9')->sum('incident_type_id');

        $vis_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','10')->sum('incident_type_id');

        $arrest_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','11')->sum('incident_type_id');

        $heli_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','12')->sum('incident_type_id');

        $code_red_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','13')->sum('incident_type_id');

        $elope_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','14')->sum('incident_type_id');

        $elev_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','15')->sum('incident_type_id');

        $disch_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','16')->sum('incident_type_id');

        $ev_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','17')->sum('incident_type_id');

        $evot_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','18')->sum('incident_type_id');

        $stat_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','19')->sum('incident_type_id');

        $otp_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','20')->sum('incident_type_id');

        $sick_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','21')->sum('incident_type_id');

        $aid_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','22')->sum('incident_type_id');

        $bert_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','23')->sum('incident_type_id');

        $distb_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','24')->sum('incident_type_id');

        $detox_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','25')->sum('incident_type_id');

        $inj_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','26')->sum('incident_type_id');

        $door_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','27')->sum('incident_type_id');

        $fl_count = DailyBlotter::with('incident')
        ->where('tour_id',$request->tour_id)->where('incident_type_id','28')->sum('incident_type_id');


        // dd($blotter_offi);
        $pdf = PDF::loadView('admin.pages.dailyblooter.stat',
        compact('blotter_offi','mds_count','esc_count','med_count','rest_count','vis_count','sp_count','assault_count','mta_count','arrest_count','heli_count','code_red_count','elope_count','elev_count','disch_count','ev_count','evot_count','stat_count','otp_count','sick_count','aid_count','bert_count','distb_count','detox_count','inj_count','door_count','fl_count'))
        ->setPaper('a4', 'landscape');
        return $pdf->stream('stat.pdf');
    }

    public function add_blotter($id){
        $commanders = TourCommander::all();
        $supervisors = Supervisor::all();
        $tour = Tour::find($id);
        $officers = Officer::all();
        $areas = Area::all();
        $buildings = Building::all();
        $codes = CodeAlarm::all();
        $crimes = Crime::all();
        $incidents = IncidentType::all();
        $jobs = JobFinal::all();
        $medicals = MedicalRequest::all();
        $others = Other::all();
        $parkings = ParkingLot::all();
        $persons = PersonRequest::all();
        $serial_numbers = SerialNumber::latest()->first();
        $entry_number = $serial_numbers->id;

        $serial_numbers_2 = SerialNumber2::latest()->first();
        $entry_number_2 = $serial_numbers_2->id;

        $serial_numbers_3 = SerialNumber3::latest()->first();
        $entry_number_3 = $serial_numbers_3->id;
        return view('admin.pages.dailyblooter.add',
        compact('entry_number','entry_number_2','entry_number_3','commanders','supervisors','tour','officers','areas','buildings','codes','crimes','incidents','jobs','medicals','others','parkings','persons'));
    }

    public function edit_blotter($id){
        $blotter = DailyBlotter::find($id);
        $commanders = TourCommander::all();
        $supervisors = Supervisor::all();
        $officers = Officer::all();
        $areas = Area::all();
        $buildings = Building::all();
        $codes = CodeAlarm::all();
        $crimes = Crime::all();
        $incidents = IncidentType::all();
        $jobs = JobFinal::all();
        $medicals = MedicalRequest::all();
        $others = Other::all();
        $parkings = ParkingLot::all();
        $persons = PersonRequest::all();
        return view('admin.pages.dailyblooter.edit',
        compact('commanders','supervisors','blotter','officers','officers','areas','buildings','codes','crimes','incidents','jobs','medicals','others','parkings','persons'));
    }

    public function onlyview_blotter($id){
        $blotter = DailyBlotter::find($id);
        $commanders = TourCommander::all();
        $supervisors = Supervisor::all();
        $officers = Officer::all();
        $areas = Area::all();
        $buildings = Building::all();
        $codes = CodeAlarm::all();
        $crimes = Crime::all();
        $incidents = IncidentType::all();
        $jobs = JobFinal::all();
        $medicals = MedicalRequest::all();
        $others = Other::all();
        $parkings = ParkingLot::all();
        $persons = PersonRequest::all();
        return view('admin.pages.dailyblooter.view',
        compact('commanders','supervisors','blotter','officers','officers','areas','buildings','codes','crimes','incidents','jobs','medicals','others','parkings','persons'));
    }

    public function blotter_delete($id){
        $blotter = DailyBlotter::find($id);
        $blotter->delete();
        return response()->json(['success'=>'Record has been deleted']);
    }

    public function blotter_store(Request $req)
    {
        $controlls=$req->all();
        // dd($controlls);
        $rules=array(
            //"entry_number"=>"required",
            "time"=>"required",
            "comment"=>"required"
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            $blotter = new DailyBlotter;
            $blotter->tour_id = $req->tour_id;
            $blotter->officer_id = json_encode($req->officer_id);
            $blotter->incident_type_id = $req->incident_type_id;
            $blotter->job_final_id = $req->job_final_id;
            $blotter->crime_id = $req->crime_id;
            $blotter->person_request_id = $req->person_request_id;
            $blotter->medical_request_id = $req->medical_request_id;
            $blotter->code_alarm_id = $req->code_alarm_id;
            $blotter->other_id = $req->other_id;
            $blotter->building_id = $req->building_id;
            $blotter->parking_lot_id = $req->parking_lot_id;
            $blotter->area_id = $req->area_id;
            $blotter->entry_number = $req->entry_number;
            $blotter->time = $req->time;
            $blotter->comment = $req->comment;
            $blotter->tour_date = $req->tour_date;
            $blotter->save();

            $serial_numbers = new SerialNumber;
            $serial_numbers->serial_numbers = $req->serial_numbers;
            $serial_numbers->save();

            $serial_numbers2 = new SerialNumber2;
            $serial_numbers2->serial_numbers_2 = $req->serial_numbers_2;
            $serial_numbers2->save();

            $serial_numbers3 = new SerialNumber3;
            $serial_numbers3->serial_numbers_3 = $req->serial_numbers_3;
            $serial_numbers3->save();

            return redirect()->route('admin.blotter',['id'=>$blotter->tour_id])->with(['success'=>"Blotter Successfully Created"]);
        }
    }

    public function blotter_update(Request $req)
    {
        $controlls=$req->all();
        // dd($controlls);
        $rules=array(
            //"entry_number"=>"required",
            "time"=>"required",
            "comment"=>"required"
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            $blotter = DailyBlotter::find($req->id);
            //$blotter->tour_id = $req->tour_id;
            $blotter->officer_id = $req->officer_id;
            $blotter->incident_type_id = $req->incident_type_id;
            $blotter->job_final_id = $req->job_final_id;
            $blotter->crime_id = $req->crime_id;
            $blotter->person_request_id = $req->person_request_id;
            $blotter->medical_request_id = $req->medical_request_id;
            $blotter->code_alarm_id = $req->code_alarm_id;
            $blotter->other_id = $req->other_id;
            $blotter->building_id = $req->building_id;
            $blotter->parking_lot_id = $req->parking_lot_id;
            $blotter->area_id = $req->area_id;
            $blotter->entry_number = $req->entry_number;
            $blotter->time = $req->time;
            $blotter->comment = $req->comment;
            $blotter->save();

            return redirect()->route('admin.blotter',['id'=>$blotter->tour_id])->with(['success'=>"Blotter Successfully Updated"]);
        }
    }

    public function blotter_locked(Request $req)
    {
        $controlls=$req->all();
        // dd($controlls);
        $rules=array(
            //"status"=>"required"
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            $blotter = DailyBlotter::where('tour_id', $req->id)->update(['status'=>'locked']);

            $tour = Tour::find($req->id);
            $tour->status = 'locked';
            $tour->save();

           //return redirect()->route('admin.blotter',['id'=>$blotter->tour_id])->with(['success'=>"Blotter Successfully Locked"]);
           return redirect()->route('admin.tour')->with(['success'=>"Blotter Successfully Locked"]);

        }
    }
}
