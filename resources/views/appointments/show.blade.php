@extends('_layout.master')

@section('content')
    <h1>{{ __("Appointments") }}</h1>
    <div>
        @foreach ($appointments as $appointments)
            <article class="post card mb-3">
                <div class="card-body">
                    <h2 class="post-subtitle">
                        {{ $appointments->startTime ." ". $appointments->endTime }}
                    </h2>
                </div>
            </article>
        @endforeach
    </div>
@endsection