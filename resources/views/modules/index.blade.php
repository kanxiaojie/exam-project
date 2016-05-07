@extends('layout')

@section('content')
    <div class="container">
        <h3>模块管理</h3>
        <hr/>
        <div class="text-right" style="padding-bottom: 18px">
            <a class="button button-rounded button-border button-primary" href="/modules/create">
                添加新模块
            </a>
        </div>
        <table id="my-table" class="table table-bordered text-center">
            <thead class="dynatable-active-page">
            <tr>
                <th>模块名称</th>
                <th>模块描述</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($modules as $module)
                <tr>
                    <td>{{ $module->name }}</td>
                    <td>{{ $module->description }}</td>
                    <td>{{ $module->created_at }}</td>
                    <td>
                        <form action="/modules/{{ $module->id }}" method="post"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">

                            <a class="btn btn-info" href="/modules/{{ $module->id }}/edit">编辑</a>
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
