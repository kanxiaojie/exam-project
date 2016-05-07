@extends('layout')

@section('content')
    <div class="container">
        <h4>修改课时信息</h4>
        <hr/>

        <form action="/courseTimes/{{ $courseTime->id }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">

            @include('forms.form-content', ['name' => $courseTime->name, 'description' => $courseTime->description, 'what' => '课时'])

            <div class="form-group">
                <div class="row">
                    <label for="modules" class="col-md-4 text-right">关联模块:</label>
                    <div class="col-md-4">
                        <select class="form-control js-example-basic-multiple"></select>
                    </div>
                </div>
            </div>

            @include('forms.form-foot')

        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(".js-example-basic-multiple").select2();
    </script>
@endsection