<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controller extends Model
{
    use HasFactory;
    protected $table = "controllers";
    protected $primaryKey = "id";
    protected $fillable = ['sid','name','email','birth','phone','pasword','status','vkey','verify','photo','faculty'];

    #<---=== Password Hash Mutators ===----->
    public function setPasswordAttribute($value){
      $this->attributes['password'] = bcrypt($value);
    }
}
