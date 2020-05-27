@extends('_layout.master')

@section('content')
    <h1 class="text-white">{{ $user->fullname }}</h1>
    <div>
        @foreach ($user->posts as $post)
            @include('posts._item')
        @endforeach
    </div>
@endsection