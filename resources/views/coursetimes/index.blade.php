@extends('layout')

@section('content')
    <div class="container">
        <h3>课时管理</h3>
        <hr/>
        <div class="text-right" style="padding-bottom: 18px">
            <a class="button button-rounded button-border button-primary" href="/courseTimes/create">
                添加新课时
            </a>
        </div>
        <table id="my-table" class="table table-bordered text-center">
            <thead class="dynatable-active-page">
            <tr>
                <th>课时名称</th>
                <th>课时描述</th>
                <th>相关模块</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courseTimes as $courseTime)
                <tr>
                    <td>{{ $courseTime->name }}</td>
                    <td>{{ $courseTime->description }}</td>
                    <td></td>
                    <td>
                        <form action="/courseTimes/{{ $courseTime->id }}" method="post"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">

                            <a class="btn btn-info" href="/courseTimes/{{ $courseTime->id }}/edit">编辑</a>
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
