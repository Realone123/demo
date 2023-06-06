<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investments extends Model
{
    
     protected $fillable=[
        'user_id','property_id','property_type_id','investment_amount','date','invested_date','description','mode_of_payment','status'
    ];
    
    
     public function property(){
        return $this->belongsTo(Property::class);
    }
    
      public function propertyType(){
        return $this->belongsTo(PropertyType::class);
    }
  
    public function propertyImages(){
        return $this->hasMany(PropertyImage::class);
    }
    
     public function investors(){
        return $this->hasMany(User::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reviews(){
        return $this->hasMany(PropertyReview::class);
    }



}
