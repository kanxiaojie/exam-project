<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\BaseRepository;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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
}
