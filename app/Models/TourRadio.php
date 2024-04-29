<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourRadio extends Model
{
    use HasFactory;

    public function radio(){
        return $this->belongsTo(Tour:: class, 'tour_id','id');
    }
}
