<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $table = 'contacts';
    protected $fillable = ['contact_name', 'contact_phone', 'contact_email', 'contact_content', 'contact_date', 'contact_status'];

    public $timestamps = false;
}