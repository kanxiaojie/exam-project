<?php

namespace App\Http\Controllers;

use App\CourseTime;
use App\Http\Requests\CourseTimeRequest;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CourseTimeController extends Controller
{
    protected $base;

    public function __construct(BaseRepository $baseRepository)
    {
        parent::__construct();

        $this->base = $baseRepository;
    }

    /**
     *查看所有课时信息
     */
    public function index()
    {
        if(Auth::user()->role_id == 3)
        {
            $courseTimes = CourseTime::orderBy('name')->get();
        }else{
            $courseTimes = CourseTime::where('user_id', Auth::user()->id)->orderBy('name')->get();
        }

        return view('coursetimes.index', compact('courseTimes'));
    }

    /**
     *创建课时
     */
    public function create()
    {
        return view('coursetimes.create');
    }

    /**
     *保存课时
     * @param CourseTimeRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CourseTimeRequest $request)
    {
        $courseTime = CourseTime::create($request->all());
        $courseTime->modules()->attach($request->input('modules'));

        return redirect('/courseTimes');
    }

    /**
     * 修改
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $courseTime = $this->base->getCourseTimeById($id);
        $moduleIds = $courseTime->modules->lists('id')->toArray();

        return view('coursetimes.edit', compact('courseTime', 'moduleIds'));
    }

    /**
     * 更新操作
     * @param CourseTimeRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CourseTimeRequest $request, $id)
    {
        $courseTime = $this->base->getCourseTimeById($id);
        $courseTime->modules()->detach();//先分离原有关联的模块
        $courseTime->modules()->attach($request->input('modules'));//再关联更新之后的模块

        $courseTime->update($request->all());

        return redirect('/courseTimes');
    }

    /**
     * 删除课时的同时分离附加的关系
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $courseTime = $this->base->getCourseTimeById($id);
        $courseTime->courses()->detach();
        $courseTime->modules()->detach();
        $courseTime->delete();

        return back();
    }
}
