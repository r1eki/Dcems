<?php

Route::group(['middleware' => ['web', 'auth', 'XSS', 'CORS'], 'prefix' => 'home', 'namespace' => 'Modules\Helpdesk\Http\Controllers'], function()
{
    Route::resource('helpdesk', 'HelpdeskController');
});