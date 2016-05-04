{{ csrf_field() }}

<div class="form-group">
    <div class="row">
        <label for="student_id" class="col-md-4 text-right" style="padding-top: 5px">{{ $whoseId }}:</label>
        <div class="col-md-4">
            <input type="text" name="student_id" id="student_id"  class="form-control" value="{{ $student_id }}">
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="name" class="col-md-4 text-right" style="padding-top: 5px">{{ $whoseName }}:</label>
        <div class="col-md-4">
            <input type="text" name="name" id="name" class="form-control" value="{{ $name }}">
        </div>
    </div>
</div>

<input type="hidden" name="role_id" value="{{ $roleId }}">

@include('forms.form-foot')