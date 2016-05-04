<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\CourseRequest;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    protected $course;

    public function __construct(BaseRepository $baseRepository)
    {
        parent::__construct();

        $this->course = $baseRepository;
    }

    /**
     *显示所有课程
     */
    public function index()
    {
        if(Auth::user()->role_id == 3){
            $courses = Course::orderBy('name')->get();
        }elseif(Auth::user()->role_id == 2){
            $courses = Auth::user()->course()->orderBy('name')->get();
        }else{
            $courses = Auth::user()->courses()->orderBy('name')->get();
        }

        return view('courses.index', compact('courses'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 创建课程
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     *保存课程
     * @param CourseRequest $courseRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CourseRequest $courseRequest)
    {
        Course::create($courseRequest->all());

        return redirect('/courses');
    }

    /**
     * 修改
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($id)
    {
        $course = $this->course->getCourseById($id);

        return view('courses.edit', compact('course'));
    }

    /**
     * 更新操作
     * @param CourseRequest $courseRequest
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CourseRequest $courseRequest, $id)
    {
        $course = $this->course->getCourseById($id);
        $course->update($courseRequest->all());

        return redirect('/courses');
    }

    public function destroy($id)
    {
        $course = $this->course->getCourseById($id);
        $course->user()->detach();
        $course->users()->detach();
        $course->delete();

        return redirect('/courses');
    }
}
