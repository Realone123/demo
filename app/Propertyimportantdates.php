<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propertyimportantdates extends Model
{
    public function nearestLocation(){
        return $this->belongsTo(NearestLocation::class);
    }
}
