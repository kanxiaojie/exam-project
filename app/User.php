<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'student_id', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * 老师和课程一对多关系
     */
    public function course()
    {
        return $this->hasMany('App\Course');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *  学生和课程多对多关系
     */
    public function courses()
    {
        return $this->belongsToMany('App\Course','course_user', 'course_id', 'user_id');
    }

    /**
     * 老师和课时是一对多关系
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courseTime()
    {
        return $this->hasMany('App\CourseTime');
    }

    /**
     * 教师和模块之间是一对多关系
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function module()
    {
        return $this->hasMany('App\Module');
    }

    /**
     * 教师和考试之间是一对多关系
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exam()
    {
        return $this->hasMany('App\Exam');
    }
}
