<?php

Route::group(['middleware' => [ 'web', 'XSS', 'CORS', 'auth'], 'prefix' => 'home', 'namespace' => 'Modules\Testimoni\Http\Controllers'], function()
{
    Route::resource('testimoni', 'TestimoniController');
});
