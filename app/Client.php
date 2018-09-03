<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $table = 'clients';
    protected $fillable = ['client_name', 'client_slug', 'client_logo'];

    public $timestamps = false;
}