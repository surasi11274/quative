<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class References extends Model
{
    //
    protected $table = 'references';

    public function ref()
    {

        return $this->belongsTo('App\Jobs');
    }
    public function cat()
    {
        return $this->belongsTo('App\Categories');
    }
}
