<?php

Route::group(['middleware' => ['web', 'auth', 'XSS', 'CORS'], 'prefix' => 'home', 'namespace' => 'Modules\Project\Http\Controllers'], function()
{
    Route::resource('portfolio', 'ProjectController');
});
