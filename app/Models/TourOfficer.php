<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourOfficer extends Model
{
    use HasFactory;

    public function tour(){
        return $this->belongsTo(Tour:: class, 'tour_id','id');
    }

    public function officer(){
        return $this->belongsTo(Officer:: class, 'officer_id','id');
    }
}
