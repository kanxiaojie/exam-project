@extends('layout')

@section('content')
    <div class="container">
        <h4>课程管理</h4>
        <hr/>
        <div id="page-container">
            @include('forms.left-panel')

            <div class="mainpanel">
                <div class="contentpanel">
                    <div class="panel-body">
                        <form action="/courses/{{ $course->id }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            @include('forms.form-content', ['name' => $course->name, 'description' => $course->description, 'what' => '教师'])
                            @include('forms.form-foot')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop