<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">Movie Database</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="nav navbar-nav navbar-right">
@if (Auth::check())

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Hi {{ Auth::user()->first_name }}
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
<a class="dropdown-item" href="{{ route('dashboard') }}">Nieuwe film toevoegen</a>
<a class="dropdown-item" href="{{ route('userpage') }}">Mijn films</a>
<a class="dropdown-item" href="{{ route('account') }}">Mijn account</a>
<a class="dropdown-item" href="#">Vrienden zoeken</a>
<a class="dropdown-item" href="{{ route('logout') }}">Log out</a>
</div>
</li>
@else
<a href="{{ route('signup') }}" class="btn btn-warning " style="margin-right: 10px" >Sign Up</a>
<a href="{{ route('signin') }}" class="btn btn-primary">Login</a>

@endif
</ul>
</div>
</nav>
</header>
