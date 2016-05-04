@extends('layout')

@section('content')
    <div class="container">
        <h4>新建课程</h4>
        <hr/>
        <form action="/courses" method="post" enctype="multipart/form-data">
            @include('forms.form-content', ['name' => old('name'), 'description' => old('description'), 'what' => '课程'])
            @include('forms.form-foot')
        </form>
    </div>
@stop