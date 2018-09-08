<?php

Route::group(['middleware' => 'web', 'prefix' => 'tracking', 'namespace' => 'Modules\Tracking\Http\Controllers'], function()
{
    Route::get('/', 'TrackingController@index');
});
