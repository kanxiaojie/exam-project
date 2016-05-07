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
                                    <th>学生学号</th>
                                    <th>学生姓名</th>
                                    <th>查询</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->student_id }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>
                                                <a href="/courses/{{ $id }}/grades/{{ $student->student_id }}">查看</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection