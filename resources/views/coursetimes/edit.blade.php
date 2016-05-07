@extends('layout')

@section('content')
    <div class="container">
        <h4>修改课时信息</h4>
        <hr/>

        <form action="/courseTimes/{{ $courseTime->id }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @include('coursetimes.form', ['name' => $courseTime->name, 'description' => $courseTime->description, 'what' => '课时'])

        </form>
    </div>
@endsection
