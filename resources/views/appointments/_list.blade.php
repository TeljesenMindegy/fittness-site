<div class="d-flex">
    @if($appointments->count() > 0)
    <div class="col-12 col-md-8 mx-auto">
        @foreach($appointments as $appointment)
            @include('appointments._item')
        @endforeach
    </div>
    @else
    <div><p class="text-light">You have no appointments</p></div>
    @endif
</div>
