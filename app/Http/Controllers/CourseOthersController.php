<?php

namespace App\Http\Controllers;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class CourseOthersController extends Controller
{
    protected $base;

    public function __construct(BaseRepository $baseRepository)
    {
        parent::__construct();
        $this->base = $baseRepository;
    }

    public function delete($id)
    {
        $course = $this->base->getCourseById($id);

        return view('courses.others.delete', compact('course'));
    }
}
