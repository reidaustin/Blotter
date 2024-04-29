<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;
    
    public function blotter_officer(){
        return $this->hasOne(DailyBlotter:: class, 'officer_id','id');
    }

    public function tour_officer(){
        return $this->hasMany(TourOfficer:: class, 'officer_id','id');
    }
}
