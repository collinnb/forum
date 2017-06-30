<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>home</title>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>
    <link href="{{ asset('css/own.css') }}" rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<nav>
    <div class="nav-wrapper red lighten-1">
        <a href="#" class="brand-logo center">Forum</a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li class="active"><a href="{{route('home')}}">home</a></li>
            <li><a href="{{route('themes')}}">Themes</a></li>

        </ul>

        <ul class="right hide-on-med-and-down">
            @if(auth::guest())
                <li><a href="{{ url('/login') }}">Aanmelden</a></li>
                <li><a href="{{ url('/register') }}">Registeren</a></li>
            @else
            <li>

                <a class="dropdown-button" href="#!" data-beloworigin="true" data-activates="dropdown1">{{auth::user()->username}}<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
        @endif
    </div>

</nav>
<ul id="dropdown1" class="dropdown-content">
    @if(auth::guest())
    @else
    <li><a href="{{route('profile',['id' => auth::user()->id])}}">profiel</a></li>
    <li class="divider"></li>
    @if(Auth::check() && Auth::user()->IsAdmin())
    <li><a href="{{route('users')}}">Users</a></li>
    <li class="divider"></li>
    @endif
    <li><a href="{{ url('/logout') }}"
           onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form"
              action="{{ url('/logout') }}"
              method="POST"
              style="display: none;">
            {{ csrf_field() }}
        </form></li>
        @endif
</ul>

@yield('content')

<footer class="page-footer red lighten-1">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Forum</h5>
                <p class="grey-text text-lighten-4">this is a forum that we needed to make for a school project</p>
            </div>

        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
<script>$(document).ready(function(){
        $('.slider').slider();
    });</script>
@yield('script')

</body>

</html>