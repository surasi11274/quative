<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //
    protected $table =  'designer_courses';
    protected $fillable = ['user_id','designer_id','courses','courses_rate','url','courses_duration','courses_duration_rate'];

}
