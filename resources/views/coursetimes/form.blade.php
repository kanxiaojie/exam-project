@inject('modules', 'App\Module')

@include('forms.form-content')

<div class="form-group">
    <div class="row">
        <label for="modules" class="col-md-4 text-right">关联模块:</label>
        <div class="col-md-4">
            <select name="modules[]" id="modules" class="form-control js-example-basic-multiple" multiple>
                @foreach($modules::where('user_id', $user->id)->orderBy('name')->get() as $module)
                    <option value="{{ $module->id }}" @if(in_array($module->id, $moduleIds)) selected @endif>{{ $module->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

@include('forms.form-foot')

@section('scripts')
    <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
    </script>
@endsection