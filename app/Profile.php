<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname','email','phone','address','profile','city','state','zip_code','tax','ira_name','preferences','distribution_email','status'
    ];


}
