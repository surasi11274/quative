<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Designer extends Model
{
    //
    protected $fillable = [
        'about' ,'experience' ,'tagStyle' ,'website' ,
        'personalID' ,'titleName' ,'name' ,'surname' ,'address' ,'zipcode' ,'selfie_ID' ,'picture_IDCard' ,
        'bankname' ,'bankaccount' ,'picture_bookbank'
        
    ];
}
