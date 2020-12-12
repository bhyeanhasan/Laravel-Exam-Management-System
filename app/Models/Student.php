<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "students";
    protected $primaryKey = "id";
    protected $fillable = ['sid','name','email','birth','phone','pasword','status','vkey','verify','photo','faculty','session','semister']; 
    
    
    
    #<---=== faculty Accessor ===----->
    public function getFacultyAttribute($value)
    {
     return strtoupper($value);
    }

    #<---=== semister Accessor ===----->
    public function getSemisterAttribute($value)
    {
     return strtoupper($value);
    }

    #<---=== name Accessor ===----->
    public function getNameAttribute($value)
    {
     return strtoupper($value);
    }


    #<---=== Password Hash Mutators ===----->
    public function setPasswordAttribute($value){
      $this->attributes['password'] = bcrypt($value);
    }
}
