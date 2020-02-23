<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    public function jobs()
    {
        return $this->belongsTo('App\Jobs');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
