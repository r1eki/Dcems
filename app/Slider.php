<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $table = 'sliders';
    protected $fillable = ['slider_img', 'slider_name', 'slider_slug', 'is_active'];

    public $timestamps = false;
}