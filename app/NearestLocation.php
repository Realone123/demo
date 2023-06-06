<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NearestLocation extends Model
{
    protected $fillable=[
       'status','user_id','property_id'
    ];


    public function locations(){
        return $this->hasMany(PropertyNearestLocation::class);
    }
}
