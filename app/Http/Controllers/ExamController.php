<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    protected $base;

    public function __construct(BaseRepository $baseRepository)
    {
        parent::__construct();
        $this->base = $baseRepository;
    }

    /**
     *显示所有考试
     */
    public function index()
    {
        if(Auth::user()->role_id == 3)
        {
            $exams = Exam::orderBy('name')->get();
        }else{
            $exams = Exam::where('user_id', Auth::user()->id)->orderBy('name')->get();
        }

        return view('exams.index', compact('exams'));
    }
}
