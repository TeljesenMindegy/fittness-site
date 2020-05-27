@extends('_layout.master')

@section('content')
    <div class="text-white">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->description }}</p>
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
