<?php

//Route::group(['middleware' => 'web'], function(){

    Route::group(['middleware' => 'auth'], function(){

        Route::get('/', 'HomeController@index');

        Route::group(['middleware' => 'admin'], function(){

           Route::resource('teachers', 'TeacherController', ['except' => 'show']);

        });
    });

    Route::auth();
//});




