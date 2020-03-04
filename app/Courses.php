<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //
    protected $table =  'designer_courses';
    protected $fillable = ['user_id','designer_id','course_id','course_rate','course_duration_id','course_duration','course_duration_rate'];

    public function designer()
    {
        return $this->belongsTo('App\Designer');
    }
}
