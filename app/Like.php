<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'jobs_user';

    //
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function job(){
        return $this->belongsTo('App\Jobs');
    }
}
