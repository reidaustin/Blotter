<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyBlotter extends Model
{
    use HasFactory;

    public function tour(){
        return $this->belongsTo(Tour:: class, 'tour_id','id');
    }

    public function officers(){
        return $this->belongsTo(Officer:: class, 'officer_id','id');
    }

    public function tour_commander(){
        return $this->belongsTo(TourCommander:: class, 'tour_commander_id','id');
    }

    public function supervisor(){
        return $this->belongsTo(Supervisor:: class, 'supervisor_id','id');
    }

    public function job(){
        return $this->belongsTo(JobFinal:: class, 'job_final_id','id');
    }

    public function crime(){
        return $this->belongsTo(Crime:: class, 'crime_id','id');
    }

    public function incident(){
        return $this->belongsTo(IncidentType:: class, 'incident_type_id','id');
    }

    public function comments(){
        return $this->hasMany(BlotterComment:: class, 'blotter_id','id');
    }
}
