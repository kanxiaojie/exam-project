<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\UserRequest;
use App\Repositories\BaseRepository;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CourseOthersController extends Controller
{
    protected $base;

    public function __construct(BaseRepository $baseRepository)
    {
        parent::__construct();
        $this->base = $baseRepository;
    }

    /**
     * 显示关联与未关联的学生分布
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function students($id)
    {
        $course = $this->base->getCourseById($id);
        $studentIds = $course->users()->where('role_id', 1)->get()->lists('student_id');
        $unStudents = User::where('role_id', 1)->whereNotIn('student_id', $studentIds)->orderBy('student_id')->get();
        $students   = $course->users()->where('role_id', 1)->orderBy('student_id')->get();

        return view('courses.others.linkStudents', compact('course', 'unStudents', 'students', 'id'));
    }

    /**
     * 可关联的学生
     * @param UserRequest|Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function linkStudents(Request $request, $id)
    {
        $course = $this->base->getCourseById($id);
        $inputs = $request->input('person');

        if(!$inputs == null)
        {
            $userId = [];

            foreach($inputs as $input)
            {
                $unLinkStudents = User::findOrFail($input);
                $studentIds = User::lists('student_id')->toArray();

                if(!in_array($unLinkStudents->student_id, $studentIds))
                {
                    $user = new User();
                    $user->student_id = $unLinkStudents->student_id;
                    $user->name = $unLinkStudents->name;
                    $user->role_id = $unLinkStudents->role_id;
                    $user->password = bcrypt('123456');
                    $user->save();
                    $userId[] = $user->id;
                }else{
                    $userId[] = User::where('student_id', $unLinkStudents->student_id)->first()->id;
                }
            }

            $course->users()->attach($userId);
        }

        return back();
    }

    /**
     * 取消关联
     * @param UserRequest|Request $userRequest
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unLinkStudents(Request $userRequest, $id)
    {
        $course = $this->base->getCourseById($id);
        $inputs = $userRequest->input('person');

        if(!$inputs == null)
        {
            $course->users()->detach($inputs);
        }

        return back();
    }

    /**
     * 显示可关联与未关联的课时信息
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function courseTimes($id)
    {
        $course = $this->base->getCourseById($id);
        $Ids = $course->courseTimes->lists('id');
        $unCourseTimes = Auth::user()->courseTime()->whereNotIn('id', $Ids)->orderBy('name')->get();
        $courseTimes = $course->courseTimes()->orderBy('name')->get();

        return view('courses.others.linkCourseTimes', compact('courseTimes', 'unCourseTimes', 'id', 'course'));
    }

    /**
     * 可关联课时
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function linkCourseTimes(Request $request, $id)
    {
        $course = $this->base->getCourseById($id);
        $inputs = $request->input('courseTime');

        if(!$inputs == null)
        {
            $course->courseTimes()->attach($inputs);
        }

        return back();
    }

    /**
     * 已关联课时
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unLinkCourseTimes(Request $request, $id)
    {
        $course = $this->base->getCourseById($id);
        $inputs = $request->input('courseTime');

        if(!$inputs == null)
        {
            $course->courseTimes()->detach($inputs);
        }

        return back();
    }

    /**
     * 显示可关联与未关联的课时信息
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function exams($id)
    {
        $course = $this->base->getCourseById($id);
        $Ids    = $course->exams->lists('id');
        $unExams = Auth::user()->exam()->whereNotIn('id', $Ids)->orderBy('name')->get();
        $exams = $course->exams()->orderBy('name')->get();

        return view('courses.others.linkExams', compact('course', 'id', 'exams', 'unExams'));
    }

    /**
     * 可关联的考试
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function linkExams(Request $request, $id)
    {
        $course = $this->base->getCourseById($id);
        $inputs = $request->input('exam');

        if(!$inputs == null)
        {
            $course->exams()->attach($inputs);
        }

        return back();
    }

    /**
     * 已关联的考试
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unLinkExams(Request $request, $id)
    {
        $course = $this->base->getCourseById($id);
        $inputs = $request->input('exam');

        if(!$inputs == null)
        {
            $course->exams()->detach($inputs);
        }

        return back();
    }


    /**
     * 查看成绩
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function grades($id)
    {
        $course = $this->base->getCourseById($id);
        $students = $course->users()->where('role_id', 1)->orderBy('student_id')->get();

        return view('courses.others.grades', compact('course', 'students', 'id'));
    }

    public function gradeShow($id, $student_id)
    {
        $course = $this->base->getCourseById($id);

        return view('courses.others.gradeShow', compact('id', 'student_id', 'course'));
    }


    /**
     * 删除课程
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete($id)
    {
        $course = $this->base->getCourseById($id);

        return view('courses.others.delete', compact('course'));
    }
}
