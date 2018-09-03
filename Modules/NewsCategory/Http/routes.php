<?php

Route::group(['middleware' => ['web', 'auth', 'XSS', 'CORS'], 'prefix' => 'home', 'namespace' => 'Modules\NewsCategory\Http\Controllers'], function()
{
    Route::resource('category', 'NewsCategoryController');
});