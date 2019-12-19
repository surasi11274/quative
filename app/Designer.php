<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Traits\HasRoles;


class Designer extends Model
{
    //
    protected $table =  'designers';
    protected $fillable = ['description','phonenumber','profilepic','tag','personalID','titleName','name','surname','birthdate','address','zipcode','selfieID','pictureIDCard','pricerate','bankname','bankaccount'];

    public function tags(){
        return $this->hasMany('App\Tags');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function job()
    {
        return $this->hasOne('App\Jobs');
    }
  
        
}

