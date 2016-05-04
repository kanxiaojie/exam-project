<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\BaseRepository;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class StudentController extends Controller
{
    protected $student;

    public function __construct(BaseRepository $baseRepository)
    {
        parent::__construct();

        $this->student = $baseRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 显示所有学生
     */
    public function index()
    {
        $students = User::where('role_id', 1)->get();

        return view('students.index', compact('students'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 创建
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * @param UserRequest $userRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * 保存
     */
    public function store(UserRequest $userRequest)
    {
        User::create($userRequest->all());

        return redirect('/students');
    }

    /**
     * @param $student_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 修改
     */
    public function edit($student_id)
    {
        $student = $this->student->getByStudentId($student_id);

        return view('students.edit', compact('student'));
    }

    /**
     * @param UserRequest $userRequest
     * @param $student_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * 更新操作
     */
    public function update(UserRequest $userRequest, $student_id)
    {
        $student = $this->student->getByStudentId($student_id);
        $student->update($userRequest->all());

        return redirect('/students');
    }

    /**
     * @param $student_id
     * @return \Illuminate\Http\RedirectResponse
     * 删除
     */
    public function destroy($student_id)
    {
        $student = $this->student->getByStudentId($student_id);
        $student->delete();

        return back();
    }
}
