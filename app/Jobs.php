<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    //
    protected $table =  'jobs';
    protected $fillable = ['categories','categories_id','tags','designer_id','url','productPic','refpicbyUser','requirement','pricerate','reference','file','canshow','jobstatus_id','token','user_id'];

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



