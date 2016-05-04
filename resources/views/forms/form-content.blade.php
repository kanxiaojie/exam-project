{{ csrf_field() }}

<div class="form-group">
    <div class="row">
        <label for="name" class="col-md-4 text-right" style="padding-top: 5px">{{ $what }}名称:</label>
        <div class="col-md-4">
            <input id="name" name="name" class="form-control" value="{{ $name }}" required>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label for="name" class="col-md-4 text-right" style="padding-top: 5px">{{ $what }}描述:</label>
        <div class="col-md-4">
            <textarea id="description" name="description" class="form-control" rows="5" required>{{ $description }}</textarea>
        </div>
    </div>
</div>

<input type="hidden" name="user_id" value="{{ $user->id }}">