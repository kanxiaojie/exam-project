@extends('layout')

@section('content')
    <div class="container">
        <h4>修改考试信息</h4>
        <hr/>

        <form action="/exams/{{ $exam->id }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @include('coursetimes.form', ['name' => $exam->name, 'description' => $exam->description, 'what' => '考试'])
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
