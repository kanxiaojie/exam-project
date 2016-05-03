@extends('layout')

@section('content')
    <div class="container">
        <h4>增加新学生</h4>
        <hr/>
        <form action="/students" method="post" enctype="multipart/form-data">
            @include('partials.person.person-form', ['name' => old('name'), 'student_id' => old('student_id'), 'whoseId' => '学生学号', 'whoseName' => '学生姓名', 'roleId' => 1])
            <input type="hidden" id="password" name="password" value="{{ bcrypt('123456') }}">
        </form>
    </div>
@stop