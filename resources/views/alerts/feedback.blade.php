{{-- @if ($errors->has($field))
    <span class="invalid-feedback" role="alert">{{ $errors->first($field) }}</span>
@endif --}}

@error('$field')
    <span class="text-danger small">{{ $message }}</span>
@enderror
