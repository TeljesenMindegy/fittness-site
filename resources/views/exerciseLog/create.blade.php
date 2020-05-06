@extends('_layout.master')

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.getElementById('editor'))
        .catch(error => {
            console.error(error)
        })
</script>
@endpush

@section('content')
<div class="card w-75 mt-5 mx-auto">
    <div class="card-header">{{ __('Save exercise') }}</div>
    <div class="card-body">
        <form action="{{ route('exerciseLog.create', ['client' => $client]) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="exerciseLog[exercise_id]">{{ __('Exercise') }}</label>
                <select class="from-contorl{{ $errors->has('exerciseLog.exercise_id') ? 'is-invalid' : '' }}" name="exerciseLog[exercise_id]">
                    <option>{{ __("Select exercise") }}</option>
                    @foreach ($exercises as $exercise)
                        <option value="{{ $exercise->id }}"{{ $exercise->id == old('exerciseLog.exercise_id') ? 'selected' : '' }}>{{ $exercise->title }}</option>
                    @endforeach
                </select>
                @foreach ($errors->get('exerciseLog.exercise_id') as $error)
                    <p class="ivalid-feedback">{{ $error }}</p>
                @endforeach 
            </div>

            <div class="form-group">
                <label for="exerciseLog[rep]">{{ __('Rep') }}</label>
                <input class="form-control{{ $errors->has('exerciseLog.rep') ? ' is-invalid' : '' }}" name="exerciseLog[rep]" type="number" value="{{ old('exerciseLog.rep') }}"></input>
                @foreach ($errors->get('exerciseLog.rep') as $error)
                    <p class="invalid-feedback">{{ $error }}</p>
                @endforeach
            </div>

            <div class="form-group">
                <label for="exerciseLog[weight]">{{ __('Weight') }}</label>
                <input class="form-control{{ $errors->has('exerciseLog.weight') ? ' is-invalid' : '' }}" name="exerciseLog[weight]" type="number" value="{{ old('exerciseLog.weight') }}"></input>
                @foreach ($errors->get('exerciseLog.weight') as $error)
                    <p class="invalid-feedback">{{ $error }}</p>
                @endforeach
            </div>

            <div class="form-group">
                <label for="exerciseLog[note]">{{ __('Notes') }}</label>
                <textarea id="editor" class="form-control{{ $errors->has('exerciseLog.note') ? ' is-invalid' : '' }}" name="exerciseLog[note]">{{ old('exerciseLog.note') }}</textarea>
                @foreach ($errors->get('exerciseLog.note') as $error)
                    <p class="invalid-feedback">{{ $error }}</p>
                @endforeach
            </div>

            <div class="form-group text-right">
                <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
