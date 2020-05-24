@extends('_layout.master')

@section('content')
<div class="card w-75 mt-5 mx-auto">
    <div class="card-header">{{__('Update appointment') }}</div>
    <div class="card-body">
        <form action="{{ route('appointment.edit', ['appointment' => $appointment]) }}" method="POST">
            @csrf

            <input hidden name="appointment[user_id]" value={{$appointment['user_id']}}>

            <div class="form-group">
                <label for="appointment[startTime]">{{ __('Start time')}}</label>
                <input class="form-control{{ $errors->has('appointment.startTime') ? ' is-invalid' : ''}}" type="datetime-local" name="appointment[startTime]" value="{{ old('appointment.startTime') }}">
                @foreach ($errors->get('appointment.startTime') as $error)
                    <p class="invalid-feedback">{{ $error }}</p>
                @endforeach     
            </div>

            <div class="form-group">
                <label for="appointment[endTime]">{{ __('End time')}}</label>
                <input class="form-control{{ $errors->has('appointment.endTime') ? ' is-invalid' : ''}}" type="datetime-local" name="appointment[endTime]" value="{{ old('appointment.endTime') }}">
                @foreach ($errors->get('appointment.endTime') as $error)
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