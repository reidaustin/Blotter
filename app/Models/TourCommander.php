<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourCommander extends Model
{
    use HasFactory;

    public function tour_commander_blotter(){
        return $this->hasOne(DailyBlotter:: class, 'tour_commander_id','id');
    }

    
}
