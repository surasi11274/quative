<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

// use Spatie\Permission\Traits\HasRoles;


class Designer extends Model
{
    use Notifiable;

    //
    protected $table =  'designers';
    protected $fillable = ['description','phonenumber','profilepic','tag','personalID','titleName','name','surname','birthdate','address','zipcode','selfieID','pictureIDCard','pricerate','bankname','bankaccount','designers_courses_id','user_id','token'];
    public $timestamps = false;
    public function tags(){
        return $this->hasMany('App\Tags');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function job()
    {
        return $this->belongsTo('App\Jobs','user_id');
    }
  
    public function courses()
    {
        return $this->hasOne('App\Courses');
    }
        
}

