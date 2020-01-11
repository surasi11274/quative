<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    //
    protected $table =  'jobs';
    protected $fillable = ['categories','tags','designer_id','email','phone','requirement','pricerate','reference','file','status'];

    public function tags(){
        return $this->hasMany('App\Tags');
    }
    public function ref()
    {
        return $this->hasMany('App\References');
    }
    public function cat()
    {
        return $this->belongsTo('App\Categories');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function designer()
    {
        return $this->hasMany('App\Designer','user_id');
    }
}



