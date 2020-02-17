<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function designer()
    {
        return $this->hasOne('App\Designer')->first();
    }
    // public function job()
    // {
    //     return $this->hasMany('App\Jobs','user_id')->where('status',0)->get();
    // }
    public function job()
    {
        return $this->hasMany('App\Jobs')->first();
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
  
}
