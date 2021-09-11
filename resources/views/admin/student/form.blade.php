<div class="form-group {{ $errors->has('Name') ? 'has-error' : ''}}">
    <label for="Name" class="control-label">{{ __('Name') }}</label>
    <input class="form-control" name="Name" type="text" id="Name" value="{{ isset($student->Name) ? $student->Name : old('Name')}}" >
    {!! $errors->first('Name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your Name?</div>
</div>
<div class="form-group {{ $errors->has('Address') ? 'has-error' : ''}}">
    <label for="Address" class="control-label">{{ __('Address') }}</label>
    <input class="form-control" name="Address" type="text" id="Address" value="{{ isset($student->Address) ? $student->Address : old('Address')}}" >
    {!! $errors->first('Address', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your Address?</div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit" value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
</div>
