<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table =  'payments';
    protected $fillable = ['user_id','designer_id','job_id','total_price','bank','dateatTransfer','timeatTransfer','fileTransfer','description'];
}
