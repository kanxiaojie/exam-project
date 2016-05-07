@extends('layout')

@section('content')
    <div class="container">
        <h4>课程管理</h4>
        <hr/>

        <div class="page-container">
            @include('forms.left-panel')

            <div class="mainpanel">
                <div class="contentpanel">
                    <div class="panel-body">
                        <h4>查看成绩</h4>
                        <hr/>
                        <table id="my-table" class="table table-bordered text-center">
                            <thead class="dynatable-active-page">
                            <tr>
                                <th>课时名称</th>
                                <th>模块名称</th>
                                <th>成绩</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($course->courseTimes as $courseTime)
                                @foreach($courseTime->modules()->orderBy('name')->get() as $module)
                                    <tr>
                                        <td>{{ $courseTime->name }}</td>
                                        <td>{{ $module->name }}</td>
                                        <td>
                                            @foreach(App\Grade::where('course_id', $id)->where('coursetime_id', $id)->where('module_id', $id)->where('user_id', $student_id)->get() as $grade)
                                                {{ $grade->grade }}
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection