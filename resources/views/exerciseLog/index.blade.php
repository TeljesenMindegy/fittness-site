@extends('_layout.master')

@section('content')
    @if($trainingExercises->count() > 0)
    @foreach($trainingExercises as $key => $exercise)
            <div class="card text-center mb-3">
                <div class="card-header bg-light">
                    <h1 class="card-title">{{ $key }}</h1>
                </div>
                <div class="card-group">
                    @foreach ($exercise as $key => $date)
                        <div class="card bg-secondary border-light">
                            <div class="card-header text-white bg-secondary">
                                <h5 class="card-title">{{ $key }}</h6>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach ($date as $workout)
                                    <li class="list-group-item text-white bg-info border-light">{{$workout->rep.' rep '.$workout->weight.' kg' }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
    @endforeach
    @else
        <div><p class="text-light">Empty exercise log</p>
        
        </div>
    @endif
@endsection
