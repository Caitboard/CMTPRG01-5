<nav class="navbar navbar-default navbar-static-top">
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
            <a class="navbar-brand" href="{{ url('#') }}">
                Movie Database
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/dashboard') }}">Home</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())

                    <li><a href="{{ url('/signin') }}">Login</a></li>
                    <li><a href="{{ url('/signup') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                            <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Nieuwe film toevoegen</a></li>
                            <li><a class="dropdown-item" href="{{ route('userpage') }}">Mijn films</a></li>
                            <li><a class="dropdown-item" href="{{ route('account') }}">Mijn account</a></li>
                            {{--<li><a class="dropdown-item" href="#">Vrienden zoeken</a></li>--}}
                            @can('isAdmin')
                            <li><a class="dropdown-item" href="{{ route('adminpage') }}">Admin pagina</a></li>
                            @endcan
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>








{{--<header>--}}
{{--<nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--<a class="navbar-brand" href="#">Movie Database</a>--}}
{{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--<span class="navbar-toggler-icon"></span>--}}
{{--</button>--}}

{{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--<ul class="nav navbar-nav navbar-right">--}}
{{--@if (Auth::check())--}}

{{--<li class="dropdown">--}}
{{--<a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">--}}
    {{--<img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">--}}
{{--Hi {{ Auth::user()->first_name }}--}}
{{--</a>--}}
{{--<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
{{--<a class="dropdown-item" href="{{ route('dashboard') }}">Nieuwe film toevoegen</a>--}}
{{--<a class="dropdown-item" href="{{ route('userpage') }}">Mijn films</a>--}}
{{--<a class="dropdown-item" href="{{ route('account') }}">Mijn account</a>--}}
{{--<a class="dropdown-item" href="#">Vrienden zoeken</a>--}}
{{--<a class="dropdown-item" href="{{ route('logout') }}">Log out</a>--}}
{{--</div>--}}
{{--</li>--}}
{{--@else--}}
{{--<a href="{{ route('signup') }}" class="btn btn-warning " style="margin-right: 10px" >Sign Up</a>--}}
{{--<a href="{{ route('signin') }}" class="btn btn-primary">Login</a>--}}

{{--@endif--}}
{{--</ul>--}}
{{--</div>--}}
{{--</nav>--}}
{{--</header>--}}
