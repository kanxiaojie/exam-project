@extends('layout')

@section('content')
    <div class="container">
        <h4>修改模块信息</h4>
        <hr/>
        <form action="/modules/{{ $module->id }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT" />
            @include('forms.form-content', ['name' => $module->name, 'description' => $module->description, 'what' => '模块'])
            @include('forms.form-foot')
        </form>
    </div>
@stop