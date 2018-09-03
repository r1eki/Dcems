<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'news';
    protected $fillable = ['category_id', 'user_id', 'news_title', 'news_slug', 'news_content', 'news_image'];

    public function user() {
    	return $this->belongsTo('App\User', 'id', 'user_id');
    }
}
