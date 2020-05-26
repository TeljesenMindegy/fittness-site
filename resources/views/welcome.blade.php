@extends('_layout.master')

@section('content')
@auth
<h1 class="mt-5">Hello {{ Auth::user()->firstname . " " . Auth::user()->lastname}}</h1>
@else
<h1 class="mt-5">Hello Stranger</h1>
@endauth

@endsection