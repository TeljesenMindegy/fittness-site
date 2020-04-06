<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">{{ __("Personal trainer") }}</a>
    <div class="d-flex flex-row order-md-2">
      <ul class="navbar-nav flex-row">
        @auth
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
          <a class="nav-link" href="#">{{ __("Appointments") }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">{{ __("Meal plan") }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('log') }}">{{ __("Workout log") }}</a>
        </li>
        <!--li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li-->
      </ul>
      <!--form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form-->
    </div>
  </nav>
</header>
