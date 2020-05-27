<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-secondary">
    <a class="navbar-brand" href="#">{{ __("Personal trainer") }}</a>
    <div class="d-flex flex-row order-md-2">
      <ul class="navbar-nav flex-row">
        @auth
          @if(Auth::user()->hasRole('trainer'))
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Train</a>
              <div class="dropdown-menu" aria-labeledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('client.index') }}">{{ __('Start exercise') }}</a>
                <a class="dropdown-item" href="{{ route('appointment.create') }}">{{ __('Make appointment') }}</a>
              </div>
            </li>
          @endif
          <li class="nav-item">
            <a class="btn btn-outline-light" href="{{ route('post.create') }}">{{ __('Publish') }}</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('profile.show', Auth::user()) }}" class="nav-link">
              {{ Auth::user()->fullname }}
            </a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="btn btn-dark mr-3" href="{{ route('logout') }}">{{ __("Logout") }}</button>
            </form>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link mr-3" href="{{ route('register') }}">{{ __("Become a member") }}</a>
          </li>
          <li class="nav-item">
           <a class="nav-link mr-3" href="{{ route('login') }}">{{ __("Login") }}</a>
          </li>
        @endauth
      </ul>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
    <div class="collapse navbar-collapse order-md-1" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('appointment.index') }}">{{ __("Appointments") }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">{{ __("Meal plan") }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('log') }}">{{ __("Workout log") }}</a>
        </li>
      </ul>
    </div>
  </nav>
</header>
