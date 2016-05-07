@extends('layout')

@section('content')
    <div class="container">
        <h4>新建课时</h4>
        <hr/>

        <form action="/courseTimes" method="post" enctype="multipart/form-data">
            @include('forms.form-content', ['name' => old('name'), 'description' => old('description'), 'what' => '课时'])

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