<?php

Route::group(['middleware' => ['web', 'auth', 'XSS', 'CORS'], 'prefix' => 'home', 'namespace' => 'Modules\Service\Http\Controllers'], function()
{
    Route::resource('services', 'ServiceController');
});
