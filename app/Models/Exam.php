<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = "exams";
    protected $primaryKey = "id";
    protected $fillable = ['tid','faculty','session','semister','course','course_id','exam_date','exam_time','exam_type','exam_mark','exam_duration','accept','status'];


    #<---=== faculty Accessor ===----->
    public function getFacultyAttribute($value)
    {
     return strtoupper($value);
    }
    #<---=== course Accessor ===----->
    public function getCourseAttribute($value)
    {
     return strtoupper($value);
    }
}
