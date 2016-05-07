@extends('layout')

@section('content')
    <div class="container">
        <h4>课程管理</h4>
        <hr/>

        <div class="page-container">
            @include('forms.left-panel')

            @include('courses.others.linkCourseTimes-form', ['ifLinked' => '可关联', 'ifLink' => 'link', 'ifLinkCourseTimes' => $unCourseTimes, 'my_table' => 'my-table', 'checkButton' => 'unCheckUsersButton', 'check' => 'unCheckUsers', 'ifCheck' => 'checked', 'button_type' => 'button-primary', 'button_name' => '确认关联'])
            @include('courses.others.linkCourseTimes-form', ['ifLinked' => '已关联', 'ifLink' => 'unLink', 'ifLinkCourseTimes' => $courseTimes, 'my_table' => 'my-table2', 'checkButton' => 'checkUsersButton', 'check' => 'checkUsers', 'ifCheck' => '', 'button_type' => 'button-caution', 'button_name' => '取消关联'])
        </div>
    </div>
@endsection