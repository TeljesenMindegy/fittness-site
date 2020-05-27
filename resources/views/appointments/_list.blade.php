<div class="d-flex">
    <div class="col-12 col-md-8 mx-auto">
        @foreach($appointments as $appointment)
            @include('appointments._item')
        @endforeach
    </div>
</div>
