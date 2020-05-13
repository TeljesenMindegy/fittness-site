<article class="post card mb-3">
    <div class="card-body">
        <h1 class="post-title">
            {{ $post->title }}
        </h1>
        <h2 class="post-subtitle">
            {{ $post->description }}
        </h2>
        <p> {{ $post->content }}</p>
    </div>
</article>