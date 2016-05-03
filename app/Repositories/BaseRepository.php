<?php

namespace App\Repositories;

use App\User;

class BaseRepository
{
    public function getByStudentId($student_id)
    {
        $user = User::where('student_id', $student_id)->first();

        return $user;
    }
}