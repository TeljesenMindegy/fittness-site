@extends('_layout.master')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->description }}</p>
    <div>
        {!! $post->content !!}
    </div>
@endsection
