<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $table = 'services';
    protected $fillable = ['service_name', 'service_slug', 'service_desc', 'service_icon'];

    public $timestamps = false;
}