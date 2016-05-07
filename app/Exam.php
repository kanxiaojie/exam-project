<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'user_id', 'name', 'description'
    ];

    /**
     * 考试和用户是多对一关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 考试和课程是多对多关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses()
    {
        return $this->belongsToMany('App\Course', 'course_exam', 'course_id', 'exam_id');
    }

    /**
     * 考试和模块是多对多关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function modules()
    {
        return $this->belongsToMany('App\Module', 'exam_module', 'exam_id', 'module_id');
    }
}
