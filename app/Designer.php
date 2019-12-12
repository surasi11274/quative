<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Designer extends Model
{
    //
    protected $fillable = array('description','phonenumber','profilepic','tag','personalID','titleName','name','surname','birthdate','address','zipcode','selfie_ID','picture_IDCard','pricerate','bankname','bankaccount');
}
