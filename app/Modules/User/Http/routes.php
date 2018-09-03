<?php

Route::group(['middleware' => ['web', 'auth', 'XSS', 'CORS'], 'prefix' => 'home', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::resource('user', 'UserController');
});
