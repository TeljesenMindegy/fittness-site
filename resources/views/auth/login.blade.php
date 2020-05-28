@extends('_layout.master')

@section('content')
<div class="w-75 mx-auto text-light">
    <h1>{{ __("Login") }}</h1>
    @if ($errors->count())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email address</label>
            <input class="form-control" name="email" type="text" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="password">{{ __("Password") }}</label>
            <input class="form-control" name="password" type="password" value="{{ old('password') }}">
        </div>
        <div class="form-group text-right">
            <button class="btn btn-primary"> {{__('Login') }}</button>
        </div>
    </form>
</div>
@endsection