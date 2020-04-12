<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table =  'profiles';
    protected $fillable = ['phonenumber','profilepic','titleName','name','surname','birthdate','user_id','token'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
