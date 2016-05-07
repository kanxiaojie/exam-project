<?php

namespace App\Repositories;

use App\Course;
use App\CourseTime;
use App\Module;
use App\User;

class BaseRepository
{
    public function getByStudentId($student_id)
    {
        $user = User::where('student_id', $student_id)->first();

        return $user;
    }

    public function getCourseById($id)
    {
        $course = Course::findOrFail($id);

        return $course;
    }

    public function getCourseTimeById($id)
    {
        $courseTime = CourseTime::findOrFail($id);

        return $courseTime;
    }

    public function getModuleById($id)
    {
        $module = Module::findOrFail($id);

        return $module;
    }
}