<div class="d-flex">
    <div class="col-12 col-md-8 mx-auto">
        @foreach($posts as $post)
            @include('posts._item')
        @endforeach
        {{ $posts->links('_layout.pagination.bs4') }}
    </div>
</div>
