<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPost extends Model
{
    use HasFactory;

    public function post(){
        return $this->belongsTo(Tour:: class, 'tour_id','id');
    }
}
