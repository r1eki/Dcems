<?php

Route::group(['middleware' => ['web', 'auth', 'XSS', 'CORS'], 'prefix' => 'home', 'namespace' => 'Modules\Slider\Http\Controllers'], function()
{
    Route::resource('slider', 'SliderController');
});