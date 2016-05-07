@extends('layout')

@section('content')
    <div class="container">
        <h4>新建考试</h4>
        <hr/>
        <form action="/exams" method="post" enctype="multipart/form-data">
            @include('coursetimes.form', ['name' => old('name'), 'description' => old('description'), 'what' => '考试', 'moduleIds' => []])
        </form>

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
    </div>
@endsection