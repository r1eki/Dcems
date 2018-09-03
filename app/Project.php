<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = 'projects';
    protected $fillable = ['service_id', 'project_name', 'project_slug', 'project_img'];

    public $timestamps = false;

    public function services() {
    	return $this->belongsTo('App\Service', 'service_id', 'id');
    }
}