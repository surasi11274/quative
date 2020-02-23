<?php

namespace App;

use ChristianKuri\LaravelFavorite\Traits\Favoriteability;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Favoriteability,Notifiable;

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
    public function favorite_jobs()
    {
        return $this->belongsToMany('App\Jobs')->withTimestamps( );
    }
    public function comments()
    {
        return $this->hasMany('App\Comments');
    }
  
}
