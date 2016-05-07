<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleRequest;
use App\Module;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    protected $base;

    public function __construct(BaseRepository $baseRepository)
    {
        parent::__construct();

        $this->base = $baseRepository;
    }

    /**
     *显示模块
     */
    public function index()
    {
        if(Auth::user()->role_id == 3)
        {
            $modules = Module::orderBy('name')->get();
        }else{
            $modules = Module::where('user_id', Auth::user()->id)->orderBy('name')->get();
        }

        return view('modules.index', compact('modules'));
    }

    /**
     * 创建模块
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('modules.create');
    }

    /**
     * 保存模块
     * @param ModuleRequest $moduleRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ModuleRequest $moduleRequest)
    {
        Module::create($moduleRequest->all());

        return redirect('/modules');
    }

    /**
     * 修改模块信息
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $module = $this->base->getModuleById($id);

        return view('modules.edit', compact('module'));
    }

    /**
     * 更新
     * @param ModuleRequest $moduleRequest
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ModuleRequest $moduleRequest, $id)
    {
        $module = $this->base->getModuleById($id);
        $module->update($moduleRequest->all());

        return redirect('/modules');
    }

    /**
     * 删除
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $module = $this->base->getModuleById($id);
        $module->courseTimes()->detach();

        $module->delete();

        return back();
    }
}
