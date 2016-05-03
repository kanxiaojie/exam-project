<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Repositories\BaseRepository;

class TeacherController extends Controller
{
    protected $teacher;

    public function __construct(BaseRepository $baseRepository)
    {
        $this->teacher = $baseRepository;

        parent::__construct();
    }

    /**
     *显示全部教师人员
     */
    public function index()
    {
        $teachers = User::where('role_id', 2)->get();

        return view('teachers.index', compact('teachers'));
    }

    /**
     * 创建教师
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * 保存
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UserRequest $request)
    {
        User::create($request->all());

        return redirect('/teachers');
    }

    /**
     * @param $student_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View 修改
     * 修改
     * @internal param $id
     */
    public function edit($student_id)
    {
        $teacher = $this->teacher->getByStudentId($student_id);

        return view('teachers.edit', compact('teacher'));
    }

    /**
     * @param UserRequest $userRequest
     * @param $student_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * 更新操作
     */
    public function update(UserRequest $userRequest, $student_id)
    {
        $teacher = $this->teacher->getByStudentId($student_id);
        $teacher->update($userRequest->all());

        return redirect('/teachers');
    }

    /**
     * @param $student_id
     * @return \Illuminate\Http\RedirectResponse
     * 删除
     */
    public function destroy($student_id)
    {
        $teacher = $this->teacher->getByStudentId($student_id);
        $teacher->delete();

        return back();
    }
}
