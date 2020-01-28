<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table =  'payments';
    protected $fillable = ['user_id','designer_id','jobs_id','name','surname','price','bank','dateatTransfer','timeatTransfer','fileTransfer','description'];
}
