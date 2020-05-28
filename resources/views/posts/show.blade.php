@extends('_layout.master')

@section('content')
    <div class="text-white">
    <h1>{{ $post->title }}</h1>
    <div class="text-center">
        @if($post->picture)
            <a href="{{ route('post.show', $post) }}">
                <img class="rounded post-thumbnail img-fluid" src="{{ asset('storage/' . $post->picture) }}" alt="{{ $post->title }}">
            </a>
        @endif
    </div> 
    <h5>{{ $post->description }}</h5>
    <div>
        {!! $post->content !!}
    </div>
    <hr>
    @auth
        <form action="{{ route('post.comment', $post) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="comment" placeholder="{{ __('Comment text ...') }}"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Comment</button>
            </div>
        </form>
    @endauth
    <h3>{{ __("Responses") }}</h3>
    <div class="text-dark">
        @foreach ($post->comments as $comment)
            @include('comments._item')
        @endforeach
    </div>
    </div>
@endsection
