<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyDocument extends Model
{
    protected $fillable=[
        'property_id','doc_name','document'
    ];
    
    
    
   

    public function property(){
        return $this->belongsTo(Property::class);
    }

}
