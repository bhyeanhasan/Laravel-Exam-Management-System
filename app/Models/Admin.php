<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
      'aid','email','password','login_date','login_time',
    ];


    #<---=== email Mutators ===----->
    public function setEmailAttribute($value)
    {
     $this->attributes['email'] = strtolower($value);
    }
}


