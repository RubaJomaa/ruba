<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   
  <title>ASK WORLD</title>
  <script src="{{asset('/libs/jquery-2.2.2.js')}}"></script>
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{asset('css/home.css')}}" media="screen" title="no title" charset="utf-8">
  <script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('/libs/bootstrap.min.js')}}"></script>
  @if(Auth::user())
  <script type="text/javascript">
  var username = '{{Auth::user()->name}}',
  user_id = {{Auth::user()->id}}
  ;
  </script>
  @endif

  <!-- Fonts -->
  <link href="{{asset('/libs/font-awesome.min.css')}}" rel='stylesheet' type='text/css'>
  <!-- <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'> -->

  <!-- Styles -->
  <link href="{{asset('/libs/bootstrap.min.css')}}" rel="stylesheet">
  <!-- {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}} -->

</head>
<body id="app-layout">
  <nav class="ask-world-nav navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="nav-color navbar-brand" href="{{ url('/') }}">
          <span>
            <img src="{{asset('/images/ruba.png')}}" alt="" width="200" />
          </span>
          
        </a>
      </div>
      <div class="right-header">
        <span class="soc soc-fb">
          <a href="https://www.facebook.com/profile.php?id=100008612233601" target="_blank">
            <img src="{{asset('/images/fb.png')}}" alt="" width="40px"/>
          </a>
        </span>
        <span class="soc soc-tw">
          <a href="https://www.facebook.com/profile.php?id=100008612233601" target="_blank">
            <img src="{{asset('/images/tw.png')}}" alt="" width="40px"/>
          </a>
        </span>
      </div>

    </div>
  </nav>
    
  <nav class="in-site-nav">
    <div class="container">
      <div class="collapse navbar-collapse navbar-default" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="in-nav-left nav navbar-nav">
          <li class="nav-i @if(Request::is('*home'))active @endif"><a href="{{ url('/home') }}"><p>
            Home
          </p></a></li>
          @if(Auth::user())
          <li class="nav-i @if(Request::is('*group*'))active @endif"><a href="{{ url('/groups') }}"><p>
            Group Disscussions
          </p></a></li>
          <li class="nav-i @if(Request::is('*article*') && !Request::is('*group*') )active @endif"><a href="{{ url('/articles') }}"><p>
            Articles
          </p></a></li>
          <li class="nav-i @if(Request::is('*users'))active @endif"><a href="{{ url('/users') }}"><p>
            Discover Members
          </p></a></li>
          @if(Auth::user()->is_admin)
          <li class="nav-i @if(Request::is('*topics'))active @endif"><a href="{{ url('/topics') }}"><p>
            Topics
          </p></a></li>
          @endif
          @endif
        </ul>

        <script type="text/javascript">
          $(document).ready(function(){
            $('.nav-i').click(function(){
              $('.nav-i').removeClass('active');
              $(this).addClass('active');
            });
          });
        </script>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
          <li><a href="{{ url('/login') }}"><p>
            Login
          </p></a></li>
          <li><a href="{{ url('/register') }}"><p>
            Register
          </p></a></li>
          @else
          <li class="dropdown @if(Request::is('*profile*'))active @endif">
            <a href="#" class="username-right-nav" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('/profile/'.Auth::user()->name) }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
              <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
  @yield('content')
  <!-- <link rel="stylesheet" href="{{asset('libs/kendo ui/styles/kendo.common-material.min.css')}}"/>
  <link rel="stylesheet" href="{{asset('libs/kendo ui/styles/kendo.material.min.css')}}" />
  <script src="{{asset('libs/kendo ui/js/kendo.core.min.js')}}"></script> -->
  <!--if i delete those lines , log out will not work correctly -->
  <!-- JavaScripts -->
  <!-- {{-- <script src="{{ elixir('js/app.js') }}"></script> --}} -->
</body>
</html>
