@extends('layout')

@section('content')
    <div class="container">
        <h3>{{ $who }}管理</h3>
        <hr/>
        <div class="text-right" style="padding-bottom: 18px">
            <a class="button button-rounded button-border button-primary" href="/{{ $uri }}/create">
                添加新{{ $who }}
            </a>
        </div>
        <table id="my-table" class="table table-bordered text-center">
            <thead class="dynatable-active-page">
            <tr>
                <th>{{ $whatRole }}</th>
                <th>{{ $who }}姓名</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($people as $person)
                <tr>
                    <td>{{ $person->student_id }}</td>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->created_at }}</td>
                    <td>
                        <form action="/{{ $uri }}/{{ $person->student_id }}" method="post"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">

                            <a class="btn btn-info" href="/{{ $uri }}/{{ $person->student_id }}/edit">编辑</a>
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
                        {{--<a class="btn btn-info" href="/{{ $uri }}/{{ $person->student_id }}/edit">编辑</a>--}}
                        {{--<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">--}}
                            {{--删除--}}
                        {{--</button>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        {{--<div class="modal fade" id="modal-delete" tabindex="-1">--}}
            {{--<div class="modal-dialog">--}}
                {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}
                        {{--<button type="button" class="close" data-dismiss="modal">--}}
                            {{--×--}}
                        {{--</button>--}}
                        {{--<h4 class="modal-title">请确认</h4>--}}
                    {{--</div>--}}
                    {{--<div class="modal-body">--}}
                        {{--<p class="lead">--}}
                            {{--<i class="fa fa-question-circle fa-lg"></i>--}}
                            {{--确定删除此信息吗?--}}
                        {{--</p>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<form action="/{{ $uri }}/{{ $person->student_id }}" method="post"--}}
                              {{--enctype="multipart/form-data">--}}
                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                            {{--<input type="hidden" name="_method" value="DELETE">--}}
                            {{--<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>--}}
                            {{--<button type="submit" class="btn btn-danger">--}}
                                {{--确定--}}
                            {{--</button>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>
@stop
