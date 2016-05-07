@extends('layout')

@section('content')
    <div class="container">
        <h4>新建课时</h4>
        <hr/>

        <form action="/courseTimes" method="post" enctype="multipart/form-data">
            @include('coursetimes.form', ['name' => old('name'), 'description' => old('description'), 'what' => '课时', 'moduleIds' => []])
        </form>
    </div>
@endsection

