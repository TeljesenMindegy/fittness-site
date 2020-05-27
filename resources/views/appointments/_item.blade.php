<article class="post card mb-3">
    <div class="card-body">
        @if (Auth::user()->hasRole("trainer"))
        <h2 class="post-subtitle">
            {{ $appointment->startTime."-".$appointment->endTime."-".$appointment->user->fullName}}
        </h2>
        @else
            {{ $appointment->startTime."-".$appointment->endTime}}
        @endif
    </div>
</article>
