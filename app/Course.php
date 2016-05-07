<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'user_id', 'name', 'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 课程和老师多对一
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * 课程和学生多对多
     */
    public function users()
    {
        return $this->belongsToMany('App\User','course_user', 'course_id', 'user_id');
    }

    /**
     * 课程和课时是多对多关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courseTimes()
    {
        return $this->belongsToMany('App\CourseTime', 'course_coursetime', 'course_id', 'coursetime_id');
    }

    /**
     * 课程和考试是多对多关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function exams()
    {
        return $this->belongsToMany('App\Exam', 'course_exam', 'course_id', 'exam_id');
    }
}
