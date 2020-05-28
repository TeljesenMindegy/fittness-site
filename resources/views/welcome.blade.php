@extends('_layout.master')

@section('content')
@auth
<h1 class="text-light">Hello {{ Auth::user()->firstname . " " . Auth::user()->lastname}}</h1>
@else
<h1 class="text-light">Hello Stranger</h1>
@endauth

@endsection