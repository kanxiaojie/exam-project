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

                Route::get('linkStudents', 'CourseOthersController@students');
                Route::post('linkStudents/link', 'CourseOthersController@linkStudents');
                Route::post('linkStudents/unLink', 'CourseOthersController@unLinkStudents');

                Route::get('linkCourseTimes', 'CourseOthersController@courseTimes');
                Route::post('linkCourseTimes/link', 'CourseOthersController@linkCourseTimes');
                Route::post('linkCourseTimes/unLink', 'CourseOthersController@unLinkCourseTimes');

                Route::get('linkExams', 'CourseOthersController@exams');
                Route::post('linkExams/link', 'CourseOthersController@linkExams');
                Route::post('linkExams/unLink', 'CourseOthersController@unLinkExams');

                Route::get('grades', 'CourseOthersController@grades');
                Route::get('grades/{student_id}', 'CourseOthersController@gradeShow');

                Route::get('delete', 'CourseOthersController@delete');
            });
        });
    });

    Route::auth();
//});




