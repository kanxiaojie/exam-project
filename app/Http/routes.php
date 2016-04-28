<?php

Route::group(['middleware' => 'web'], function(){

    Route::group(['middleware' => 'auth'], function(){

        Route::get('/', 'HomeController@index');


    });

    Route::auth();
});




