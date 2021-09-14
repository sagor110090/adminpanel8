<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ __('Name') }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($student->name) ? $student->name : old('name')}}" required>
    {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your 'Name'?</div>
</div>
<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    <label for="role" class="control-label">{{ __('Role') }}</label>
    <input class="form-control" name="role" type="text" id="role" value="{{ isset($student->role) ? $student->role : old('role')}}" required>
    {!! $errors->first('role', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your 'Role'?</div>
</div>
<div class="form-group {{ $errors->has('father_name') ? 'has-error' : ''}}">
    <label for="father_name" class="control-label">{{ __('Father Name') }}</label>
    <input class="form-control" name="father_name" type="text" id="father_name" value="{{ isset($student->father_name) ? $student->father_name : old('father_name')}}" required>
    {!! $errors->first('father_name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your 'Father Name'?</div>
</div>
<div class="form-group {{ $errors->has('mother_name') ? 'has-error' : ''}}">
    <label for="mother_name" class="control-label">{{ __('Mother Name') }}</label>
    <input class="form-control" name="mother_name" type="text" id="mother_name" value="{{ isset($student->mother_name) ? $student->mother_name : old('mother_name')}}" required>
    {!! $errors->first('mother_name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your 'Mother Name'?</div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit" value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
</div>
