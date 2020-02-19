<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobfiles extends Model
{
    //
    protected $table =  'jobfiles';
    protected $fillable = ['user_id','designer_id','job_id','fileimgname','fileartworkname','filelinks','workdescription'];

    public function job(){
        return $this->belongsTo('App\Jobs');
    }
}
