@extends('layout')

@section('content')
    <div class="container">
        <h4>新建模块</h4>
        <hr/>
        <form action="/modules" method="post" enctype="multipart/form-data">
            @include('forms.form-content', ['name' => old('name'), 'description' => old('description'), 'what' => '模块'])
            @include('forms.form-foot')
        </form>
    </div>
@stop