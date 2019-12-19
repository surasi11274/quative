<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $table = 'categories';

    public function ref()
    {
        return $this->hasMany('App\References');
    }
}
