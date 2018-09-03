<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    //
    protected $table = 'testimoni';
    
    protected $fillable = ['testi_name', 'testimoni', 'office'];

    public $timestamps = false;
}
