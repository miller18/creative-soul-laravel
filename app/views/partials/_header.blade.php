<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Creative Soul</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>{{ link_to('/schedules', 'Schedules') }}</li>
        <li>{{ link_to('/instructors', 'Instructors') }}</li>
        <li>{{ link_to('/students', 'Students') }}</li>
       
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
        <li><a href="#">Logged in as <strong>{{{ Auth::user()->username }}}</strong></a></li>
        <li><a href="{{ URL::to('logout?_token='.csrf_token()) }}">Log Out</a></li>
        @else
        <li>{{ link_to('login', 'Log In') }}</li>
        @endif

        <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li> -->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>