<div class="post-meta d-flex">
    <a href="{{ route('profile.show', $post->user) }}">
        <img class="avatar" src="{{ $post->user->avatar }}" alt="{{ $post->user->fullname }}">
    </a>
    <div class="info ml-2">
        <p>
            <a class="user" href="{{ route('profile.show', $post->user) }}">
                {{ $post->user->fullname }}
            </a>

            @can('update', $post)
                <a class="edit btn btn-sm btn-outline-primary ml-2" href="{{ route('post.edit', $post) }}">{{ __('Edit') }}</a>
            @endcan
        </p>
    </div>
            <form action="{{ route('post.delete', ['post' => $post]) }}" method="POST">
                @csrf
                <button class="btn btn-sm btn-outline-danger ml-2">{{ __('Delete') }}</a>
            </form>
</div>
