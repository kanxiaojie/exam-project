<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseTime extends Model
{
    protected $fillable = [
        'user_id', 'name', 'description'
    ];

    /**
     * 课时和老师是多对一关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 课程和课时是多对多关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses()
    {
        return $this->belongsToMany('App\Course', 'course_coursetime', 'course_id', 'coursetime_id');
    }

    /**
     * 课时和模块是多对多关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function modules()
    {
        return $this->belongsToMany('App\Module', 'coursetime_module', 'coursetime_id', 'module_id');
    }
}
