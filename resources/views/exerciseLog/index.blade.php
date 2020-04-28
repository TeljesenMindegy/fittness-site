@extends('_layout.master')

@section('content')
    @foreach($trainingExercises as $exercise)
        @if($exercise->trainingDate->user_id == Auth::user()->id )
            <article class="card">
                <div class="card-header">
                    {{ $exercise->trainingDate->date }}
                </div>
                <div class="card-body">
                    <p>{{ $exercise->name }}</p>
                    <p>{{ $exercise->rep . " x " . $exercise->weight }}</p>
                    </div>
            </article>
        @endif
    @endforeach
@endsection
