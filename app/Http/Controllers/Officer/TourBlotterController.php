<?php

namespace App\Http\Controllers\Officer;

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
use App\Models\TourOfficer;
use App\Models\TourRadio;
use App\Models\TourPost;
use App\Models\SerialNumber;
use Validator;
use PDF;
use Auth;

class TourBlotterController extends Controller
{
    //
    public function view_locked_tour(){
        $tours = Tour::with('blotter','tour_commander','supervisor','officer')->get();
        // dd($tours);
        return view('user.pages.locked_tours.locked',compact('tours'));
    }

    public function user_legend(){
        return view('user.pages.legend.table');
    }

    public function view_blotter(Request $request,$id){
        $tour = Tour::find($id);
        $blotters = DailyBlotter::with('officers','job','crime','comments')
        ->where('tour_id',$tour->id)->get();

        $blotter_comments = DailyBlotter::with('comments')
        ->where('id',$request->blotter_id)->get();
        // dd($blotters);
        return view('user.pages.dailyblooter.table',compact('tour','blotters','blotter_comments'));
    }

    public function view_blotter_pdf(Request $request){
        $blotters = Tour::with('blotter','officer','tour_commander','supervisor','tour_radio','tour_post','tour_officer')->where('id',$request->tour_id)->first();
        $tour_officers = TourOfficer::with('officer')
        ->where('tour_id', $blotters->id)->get();
        $blotter_offi = DailyBlotter::with('officers','job','crime','comments')
        ->where('tour_id',$blotters->id)->get();
        // dd($tour_officers);
        $pdf = PDF::loadView('user.pages.dailyblooter.pdf',compact('blotters','tour_officers','blotter_offi'));
        return $pdf->stream('blotter.pdf');
    }

    public function view_single_pdf(Request $request,$id){
        $blotter = DailyBlotter::with('tour','officers')->find($id);

        $blotters = Tour::with('tour_post','tour_officer','tour_radio')
        ->where('id',$blotter->tour_id)->first();

        $tour_officers = TourOfficer::with('officer')
        ->whereRelation('tour','id',$blotter->tour_id)->get();
        $blotter_offi = DailyBlotter::with('officers','job','crime','comments')
        ->where('tour_id',$blotter->tour_id)->get();
        // dd($blotters);

        $pdf = PDF::loadView('user.pages.dailyblooter.single_pdf',compact('blotters','blotter','tour_officers','blotter_offi'));
        return $pdf->stream('blotter.pdf');
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
        $entry_number = "00000".$serial_numbers->id;
        return view('user.pages.dailyblooter.add',
        compact('entry_number','commanders','supervisors','tour','officers','areas','buildings','codes','crimes','incidents','jobs','medicals','others','parkings','persons'));
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
        return view('user.pages.dailyblooter.edit',
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
        return view('user.pages.dailyblooter.view',
        compact('commanders','supervisors','blotter','officers','officers','areas','buildings','codes','crimes','incidents','jobs','medicals','others','parkings','persons'));
    }

    public function blotter_delete($id){
        $tour = DailyBlotter::find($id);
        $tour->delete();
        return redirect()->back()->withSuccess('Successfully Deleted');
    }

    public function blotter_store(Request $req)
    {
        $controlls=$req->all();
        // dd($controlls);
        $rules=array(
            "entry_number"=>"required",
            "time"=>"required",
            "comment"=>"required"
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            $blotter = new DailyBlotter;
            $blotter->user_id = Auth::user()->id;
            $blotter->user_name = Auth::user()->name;
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
            $blotter->save();

            $serial_numbers = new SerialNumber;
            $serial_numbers->serial_numbers = $req->serial_numbers;
            $serial_numbers->save();

            return redirect()->route('blotter',['id'=>$blotter->tour_id])->with(['success'=>"Blotter Successfully Created"]);
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

            return redirect()->route('blotter',['id'=>$blotter->tour_id])->with(['success'=>"Blotter Successfully Updated"]);
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
           return redirect()->route('tour')->with(['success'=>"Blotter Successfully Locked"]);

        }
    }

    public function view_officer(){
        $officers = Officer::all();
        return view('user.pages.officer.table',compact('officers'));
    }

    public function add_officer(){
        return view('user.pages.officer.add');
    }

    public function edit_officer($id){
        $officer = Officer::find($id);
        return view('user.pages.officer.edit',compact('officer'));
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

    public function view_supervisor(){
        $supervisors = Supervisor::all();
        return view('user.pages.Supervisor.table',compact('supervisors'));
    }

    public function add_supervisor(){
        return view('user.pages.Supervisor.add');
    }

    public function edit_supervisor($id){
        $supervisor = Supervisor::find($id);
        return view('user.pages.Supervisor.edit',compact('supervisor'));
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

    public function view_commander(){
        $commanders = TourCommander::all();
        return view('user.pages.TourCommander.table',compact('commanders'));
    }

    public function add_commander(){
        return view('user.pages.TourCommander.add');
    }

    public function edit_commander($id){
        $commander = TourCommander::find($id);
        return view('user.pages.TourCommander.edit',compact('commander'));
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

    public function view_tour(){
        $tours = Tour::with('blotter','tour_commander','supervisor','officer')->get();
        // dd($tours);
        return view('user.pages.tour.table',compact('tours'));
    }

    public function add_tour(){
        $commanders = TourCommander::all();
        $supervisors = Supervisor::all();
        $officers = Officer::all();
        return view('user.pages.tour.add',compact('commanders','supervisors','officers'));
    }

    public function edit_tour($id){
        $tour = Tour::with('tour_radio','tour_post')->find($id);
        $tour_officers = Officer::with('tour_officer')
        ->whereRelation('tour_officer', 'tour_id', $tour->id)->get();
        // dd($tour);
        $commanders = TourCommander::all();
        $supervisors = Supervisor::all();
        $officers = Officer::all();
        return view('user.pages.tour.edit',compact('tour','commanders','supervisors','officers','tour_officers'));
    }

    public function tour_delete($id){
        $tour = Tour::find($id);
        $tour->delete();
        return redirect()->back()->withSuccess('Successfully Deleted');
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
            //"post"=>"required"
                        "comment"=>"required"

        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            $tour = new Tour;
            $tour->user_id = Auth::user()->id;
            $tour->user_name = Auth::user()->name;
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

            //$tour->vehicle_5 = $req->vehicle_5;
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

            return redirect()->route('tour')->with(['success'=>"Tour Successfully Created"]);
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
            //"vehicle_5"=>"required",
            //"vehicle_6"=>"required",
            //"petrol_man"=>"required",
            //"radio"=>"required",
            //"post"=>"required"
            "comment"=>"required"

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

            //$tour->vehicle_5 = $req->vehicle_5;
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

            return redirect()->route('tour')->with(['success'=>"Tour Successfully Updated"]);
        }
    }
}
