<?php

//Route::group(['middleware' => 'web'], function(){

    Route::group(['middleware' => 'auth'], function(){

        Route::get('/', 'HomeController@index');

        Route::group(['middleware' => 'admin'], function(){
           Route::resource('teachers', 'TeacherController', ['except' => 'show']);
           Route::resource('students', 'StudentController', ['except' => 'show']);
        });

        Route::group(['middleware' => 'teacher'], function(){
           Route::resource('courses', 'CourseController', ['except' => 'show']);
           Route::resource('courseTimes', 'CourseTimeController', ['except' => 'show']);
           Route::resource('modules', 'ModuleController', ['except' => 'show']);
           Route::resource('exams', 'ExamController', ['except' => 'show']);

            Route::group(['prefix' => '/courses/{id}'], function(){
                Route::get('delete', 'CourseOthersController@delete');
            });
        });
    });

    Route::auth();
//});




