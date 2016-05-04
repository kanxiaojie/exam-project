@extends('layout')

@section('content')
    <div class="container">
        <h4>修改教师信息</h4>
        <hr/>
        <form action="/teachers/{{ $teacher->student_id }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @include('partials.person.person-form', ['name' => $teacher->name, 'student_id' => $teacher->student_id, 'whoseId' => '教师工号', 'whoseName' => '教师姓名', 'roleId' => 2])
            <input type="hidden" id="password" name="password" value="{{ bcrypt('123456') }}">
        </form>

        @include('partials.errors')
    </div>
@stop