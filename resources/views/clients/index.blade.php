@extends('_layout.master')

@section('content')
<div class="card w-75 mt-5 mx-auto">
    <div class="card-header">{{ __('Save exercise') }}</div>
    <div class="card-body">
        <form action="{{ route('client.index', ['client' => $clients]) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="chosen[client_id]">{{ __('Client') }}</label>
                <select class="form-control{{ $errors->has('chosen.client_id') ? ' is-invalid' : '' }}" name="chosen[client_id]">
                    <option>{{ __("Select client") }}</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->user_id }}" {{ $client->id == old('client.client_id') ? 'selected' : '' }}>{{ $client->user->FullName }}</option>
                    @endforeach
                </select>
                @foreach ($errors->get('chosen.client_id') as $error)
                <p class="invalid-feedback">{{ $error }}</p>
                @endforeach
            </div>

            <div class="form-group text-right">
                <button class="btn btn-primary" type="submit">{{ __('Choose') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
                        
