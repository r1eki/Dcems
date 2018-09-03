<?php

Route::group(['middleware' => ['web', 'auth', 'XSS', 'CORS', 'isAdmin'], 'prefix' => 'home', 'namespace' => 'Modules\Client\Http\Controllers'], function()
{
    Route::resource('clients', 'ClientController');
});
