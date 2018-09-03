<?php

Route::group(['middleware' => ['web', 'auth', 'XSS', 'CORS'], 'prefix' => 'home', 'namespace' => 'Modules\Subscriber\Http\Controllers'], function()
{
    Route::resource('subscriber', 'SubscriberController');
});
