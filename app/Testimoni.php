<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    //
    protected $table = 'testimoni';
    protected $primaryKey = 'testi_id';
    protected $fillable = ['testi_name', 'testimoni', 'office'];

    public $timestamps = false;
}
