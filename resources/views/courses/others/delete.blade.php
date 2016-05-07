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

                        <div class="form-group">
                            <div class="row">
                                <h4 class="col-md-5 text-right">课程名称：</h4>
                                <h4 class="col-md-4">{{ $course->name }}</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <h4 class="col-md-5 text-right">课程描述：</h4>
                                <h4 class="col-md-4">{{ $course->description }}</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <h4 class="col-md-5 text-right">创建人：</h4>
                                <h4 class="col-md-4">{{ $course->user()->where('role_id', 2)->first()->name }}</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <h4 class="col-md-5 text-right">创建时间：</h4>
                                <h4 class="col-md-4">{{ $course->created_at }}</h4>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                                删除
                            </button>
                            <a href="javascript:void(0)" onclick="window.history.go(-1); return false;" class="btn btn-default">取消</a>
                        </div>

                        {{--<form action="/courses/{{ $course->id }}" method="post" enctype="multipart/form-data">--}}
                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                            {{--<input type="hidden" name="_method" value="DELETE">--}}

                            {{--<div class="form-group text-center">--}}
                                {{--<button type="submit" class="btn btn-danger">删除</button>--}}
                                {{--<a href="javascript:void(0)" onclick="window.history.go(-1); return false;" class="btn btn-default">取消</a>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-delete" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            ×
                        </button>
                        <h4 class="modal-title">请确认</h4>
                    </div>
                    <div class="modal-body">
                        <p class="lead">
                            <i class="fa fa-question-circle fa-lg"></i>
                            确定删除此信息吗?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <form action="/courses/{{ $course->id }}" method="post"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-danger">
                                确定
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop