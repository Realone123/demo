<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyVideo extends Model
{
    protected $fillable=[
        'property_id','video'
    ];
}
