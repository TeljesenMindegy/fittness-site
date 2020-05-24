@extends('_layout.master')

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.getElementById('editor'))
        .catch(error => {
            console.error(error)
        })
</script>
@endpush

@section('content')
<div class="card w-75 mt-5 mx-auto">
    <div class="card-header">{{ __('Update') }} - {{ $post->title }}</div>
    <div class="card-body">
        <form action="{{ route('post.edit', ['post' => $post]) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="post[title]">{{ __('Title') }}</label>
                <input class="form-control{{ $errors->has('post.title') ? ' is-invalid' : '' }}" type="text" name="post[title]" value="{{ old('post.title', $post->title) }}">
                @foreach ($errors->get('post.title') as $error)
                    <p class="invalid-feedback">{{ $error }}</p>
                @endforeach
            </div>

            <div class="form-group">
                <label for="post[description]">{{ __('Description') }}</label>
                <textarea class="form-control{{ $errors->has('post.description') ? ' is-invalid' : '' }}" name="post[description]">{{ old('post.description', $post->description) }}</textarea>
                @foreach ($errors->get('post.description') as $error)
                    <p class="invalid-feedback">{{ $error }}</p>
                @endforeach
            </div>

            <div class="form-group">
                <label for="post[content]">{{ __('Content') }}</label>
                <textarea id="editor" class="form-control{{ $errors->has('post.content') ? ' is-invalid' : '' }}" name="post[content]">{{ old('post.content', $post->content) }}</textarea>
                @foreach ($errors->get('post.content') as $error)
                    <p class="invalid-feedback">{{ $error }}</p>
                @endforeach
            </div>

            <div class="form-group text-right">
                <button class="btn btn-primary" type="submit">{{ __('Update') }}</button>
            </div>

        </form>
    </div>
</div>
@endsection
