<?php

Route::group(['middleware' => ['web', 'auth', 'XSS', 'CORS'], 'prefix' => 'home', 'namespace' => 'Modules\News\Http\Controllers'], function()
{
    Route::resource('news', 'NewsController');
});