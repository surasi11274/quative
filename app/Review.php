<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table =  'reviews';
    protected $fillable = ['rating','reviewdescription','complacency','reasonableprice','skillandexpertise','user_id','designer_id','jobs_id'];
}
