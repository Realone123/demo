<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    
     protected $fillable=[
        'subject','message'
    ];
    
    
    
    
      public function propertyType(){
        return $this->belongsTo(PropertyType::class);
    }
  
    public function receipts(){
        return $this->hasMany(Receipt::class);
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
