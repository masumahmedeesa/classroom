<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  <button class="navbar-toggler bg-danger" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="/posts"> <h4>    </h4> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts"> <h4>    </h4> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts"> <h4>    </h4> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts"> <h4>    </h4> </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/classhome"> <h4 style="color:aquamarine"> Virtual Classroom </h4> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts"> <h4>    </h4> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts"> <h4>    </h4> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts"> <h4>    </h4> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts"> <h4> Posts </h4> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts"> <h4>    </h4> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts/create"> <h4> Create Post </h4> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts"> <h4>    </h4> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"> <h4> Schedule </h4> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts"> <h4>    </h4> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"> <h4> Profile </h4> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts"> <h4>    </h4> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"> <h4> About </h4> </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Notices
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/">hello</a>
          <a class="dropdown-item" href="/">world</a>
          <div class="dropdown-divider"></div>
          
        </div>
      </li> -->
<!-- </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" style="background:#2C2C28; color:aquamarine;" type="search" placeholder="Search" aria-label="Search" >
      <button class="btn btn-outline-success my-2 my-sm-0" style="color:aquamarine;" type="submit">Search</button>
    </form>
  </div>
</nav> -->

<nav class="navbar navbar-expand-lg navbar-inverse bg-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/classhome') }}">
      <h3 style="color:aquamarine;"> {{ config('app.name', 'Laravel') }} | Virtual </h3>
    </a>



    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" style="background:#2C2C28; color:aquamarine;" type="search" placeholder="Search" aria-label="Search" >
      <button class="btn btn-outline-success my-2 my-sm-0" style="color:aquamarine;" type="submit">Search</button>
    </form> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->

      <ul class="nav navbar-nav mr-auto">

        <li class="nav-item">
          <a class="nav-link" href="#">
            <h4> </h4>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <h4> </h4>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <h4> </h4>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/posts">
            <h5> Posts </h5>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <h4> </h4>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/posts/create">
            <h5> Create Post </h5>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/posts">
            <h4> </h4>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('schedules')}}">
            <h5> Schedule </h5>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <h4> </h4>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/courses">
            <h5> Courses </h5>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/posts">
            <h4> </h4>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <h5> Performances </h5>
          </a>
        </li>

      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">
            <h4> {{ __('Login') }} </h4>
          </a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">
            <h4> {{ __('Register') }} </h4>
          </a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
          
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item btn btn-danger" href="/dashboard"> Dashboard </a>
            <a class="dropdown-item" href="/profile"> Profile </a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
             
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>