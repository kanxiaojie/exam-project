<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Http\Requests\ExamRequest;
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

    /**
     * 创建考试
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('exams.create');
    }

    /**
     * 保存考试
     * @param ExamRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ExamRequest $request)
    {
        $exam = Exam::create($request->all());
        $exam->modules()->attach($request->input('modules'));

        return redirect('exams');
    }

    /**
     * 修改
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $exam = $this->base->getExamById($id);
        $moduleIds = $exam->modules->lists('id')->toArray();

        return view('exams.edit', compact('exam', 'moduleIds'));
    }

    /**
     * 更新考试
     * @param ExamRequest $examRequest
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ExamRequest $examRequest, $id)
    {
        $exam = $this->base->getExamById($id);
        $exam->modules()->detach();
        $exam->modules()->attach($examRequest->input('modules'));

        $exam->update($examRequest->all());

        return redirect('/exams');
    }

    /**
     * 删除考试
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $exam = $this->base->getExamById($id);
        $exam->modules()->detach();
        $exam->courses()->detach();

        $exam->delete();

        return back();
    }
}
