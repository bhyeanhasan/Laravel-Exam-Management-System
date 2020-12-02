<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = "teachers";
    protected $primaryKey = "id";
    protected $fillable = ['tid','name','email','birth','phone','password','status','vkey','verify','photo','faculty'];   


    #<---=== faculty Accessor ===----->
    public function getFacultyAttribute($value)
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
