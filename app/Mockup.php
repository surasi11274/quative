<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mockup extends Model
{
    //
    protected $table =  'mockup';
    protected $fillable = ['logo','user_id','token'];
}
