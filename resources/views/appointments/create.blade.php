@extends('_layout.master')

@section('content')
<div class="card w-75 mt-5 mx-auto">
    <div class="card-header">{{__('Record appointment') }}</div>
    <div class="card-body">
        <form action="{{ route('appointment.create') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="appointment[user_id]">{{ __('Client') }}</label>
                <select class="form-control{{ $errors->has('appointment.user_id') ? ' is-invalid' : '' }}" name="appointment[user_id]">
                    <option>{{ __("Select your client") }}</option>
                    @foreach ($user_options as $client)
                        <option value="{{ $client->id }}" {{ $client->id == old('appointment.user_id') ? 'selected' : '' }}>{{ $client->fullName }}</option>
                    @endforeach
                </select>
                @foreach ($errors->get('appointment.user_id') as $error)
                    <p class="invalid-feedback">{{ $error }}</p>
                @endforeach
            </div>

            <div class="form-group">
                <label for="appointment[startTime]">{{ __('Start time')}}</label>
                <input class="form-control{{ $errors->has('appointment.startTime') ? ' is-invalid' : ''}}" type="datetime-local" name="appointment[startTime]" value="{{ old('appointment.startTime') }}">
                @foreach ($errors->get('appointment.startTime') as $error)
                    <p class="invalid-feedback">{{ $error }}</p>
                @endforeach     
            </div>

            <div class="form-group">
                <label for="appointment[endTime]">{{ __('Start time')}}</label>
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