<article class="p-1">
        @if (Auth::user()->hasRole("trainer"))
        <div class="card text-center">
            <div class="card-body">
                <h1><i class="fas fa-calendar-times"></i>{{ " " . date('d m Y', strtotime($appointment->startTime)) }}</h1>
                <h5><i class="fas fa-clock"></i>
                    {{ " Time: " . date('H:i', strtotime($appointment->startTime))
                    . " - " . date('H:i', strtotime($appointment->endTime))  }}
                </h5>
                <h5><i class="fas fa-user"></i>{{ " Client: " . $appointment->user->fullName}}
            </div>
        </div>
        @else
        <div class="card text-center">
            <div class="card-body">
                <h1><i class="fas fa-calendar-times"></i>{{ " " . date('d m Y', strtotime($appointment->startTime)) }}</h1>
                <h5><i class="fas fa-clock"></i>
                    {{ " Time: " . date('H:i', strtotime($appointment->startTime))
                    . " - " . date('H:i', strtotime($appointment->endTime))  }}
                </h5>
            </div>
        </div>
        @endif
</article>
