<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'user_id', 'name', 'description'
    ];

    /**
     * 模块和老师是多对一关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 模块和课时多对多关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courseTimes()
    {
        return $this->belongsToMany('App\CourseTime', 'coursetime_module', 'coursetime_id', 'module_id');
    }

    /**
     * 考试和模块是多对多关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function exams()
    {
        return $this->belongsToMany('App\Exam', 'exam_module', 'exam_id', 'module_id');
    }
}
