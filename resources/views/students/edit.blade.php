@extends('layout')

@section('content')
    <div class="container">
        <h4>修改学生信息</h4>
        <hr/>
        <form action="/students/{{ $student->student_id }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @include('partials.person.person-form', ['name' => $student->name, 'student_id' => $student->student_id, 'whoseId' => '学生学号', 'whoseName' => '学生姓名', 'roleId' => 1])
            <input type="hidden" id="password" name="password" value="{{ bcrypt('123456') }}">
        </form>
    </div>
@stop