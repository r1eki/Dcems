<?php

Route::group(['middleware' => ['web', 'auth', 'XSS', 'CORS'], 'prefix' => 'home', 'namespace' => 'Modules\Role\Http\Controllers'], function()
{
    Route::resource('roles', 'RoleController');
});
