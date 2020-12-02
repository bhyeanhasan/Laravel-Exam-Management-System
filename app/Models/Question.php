<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = "questions";
    protected $primaryKey = "id";
    protected $fillable = ['exam_id','question','option1','option2','option3','option4','ans',];

    
    #<---=== question Accessor ===----->
    public function getQuestionAttribute($value)
    {
     return strtoupper($value);
    }

    #<---=== option1 Accessor ===----->
    public function getOption1Attribute($value)
    {
     return strtoupper($value);
    }

    #<---=== option2 Accessor ===----->
    public function getOption2Attribute($value)
    {
     return strtoupper($value);
    }

    #<---=== option3 Accessor ===----->
    public function getOption3Attribute($value)
    {
     return strtoupper($value);
    }

    #<---=== option4 Accessor ===----->
    public function getOption4Attribute($value)
    {
     return strtoupper($value);
    }
}
