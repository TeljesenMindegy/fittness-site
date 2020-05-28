<article class="post card mb-3">
    <div class="card-body">
        @include('posts._meta')
        <div class="text-center">
            @if($post->picture)
                <a href="{{ route('post.show', $post) }}">
                    <img class="post-thumbnail img-fluid" src="{{ asset('storage/' . $post->picture) }}" alt="{{ $post->title }}">
                </a>
            @else
                <a href="{{ route('post.show', $post) }}">
                    <img class="post-thumbnail img-fluid" src="https://via.placeholder.com/800x240" alt="{{ $post->title }}">
                </a>
            @endif
        </div>
        <h1 class="post-title">
            <a href="{{ route('post.show', ['post' => $post]) }}">
                {{ $post->title }}
            </a>
        </h1>
        <h2 class="post-subtitle">
            {{ $post->description }}
        </h2>
    </div>
</article>