@extends('layout')

@section('content')
    <div class="container">
        <h3>课程管理</h3>
        <hr/>
        <div class="text-right" style="padding-bottom: 18px">
            <a class="button button-rounded button-border button-primary" href="/courses/create">
                添加新课程
            </a>
        </div>
        <table id="my-table" class="table table-bordered text-center">
            <thead class="dynatable-active-page">
            <tr>
                <th>课程名称</th>
                <th>课程描述</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->created_at }}</td>
                    <td>
                        <a class="btn btn-info" href="/courses/{{ $course->id }}/edit">管理</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
