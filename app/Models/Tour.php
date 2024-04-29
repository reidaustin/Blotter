<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    public function blotter(){
        return $this->hasMany(DailyBlotter:: class, 'tour_id','id');
    }

    public function tour_commander(){
        return $this->belongsTo(TourCommander:: class, 'tour_commander_id','id');
    }

    public function supervisor(){
        return $this->belongsTo(Supervisor:: class, 'supervisor_id','id');
    }

    public function officer(){
        return $this->belongsTo(Officer:: class, 'officer_id','id');
    }

    public function tour_officer(){
        return $this->hasMany(TourOfficer:: class, 'tour_id','id');
    }

    public function tour_radio(){
        return $this->hasMany(TourRadio:: class, 'tour_id','id');
    }

    public function tour_post(){
        return $this->hasMany(TourPost:: class, 'tour_id','id');
    }
}
