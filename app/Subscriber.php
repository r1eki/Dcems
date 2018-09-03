<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    //
    protected $table = 'subscribes';
    protected $fillable = ['subscribe_email', 'subscribe_date'];

    public $timestamps = false;
}
