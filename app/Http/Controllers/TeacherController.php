<?php

namespace App\Http\Controllers;

use App\Repositories\BaseRepository;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

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
}
