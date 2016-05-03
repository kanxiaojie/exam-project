@extends('layout')

@section('content')
    <div class="container">
        <h4>增加新教师</h4>
        <hr/>
        <form action="/teachers" method="post" enctype="multipart/form-data">
            @include('partials.person.person-form', ['name' => old('name'), 'student_id' => old('student_id'), 'whoseId' => '教师工号', 'whoseName' => '教师姓名', 'roleId' => 2])
            <input type="hidden" id="password" name="password" value="{{ bcrypt('123456') }}">
        </form>
    </div>
@stop