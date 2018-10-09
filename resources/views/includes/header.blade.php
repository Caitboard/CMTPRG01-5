<header>
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                        {{--<a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>--}}
                        {{--<a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>--}}
                        {{--<a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>--}}
                        <a class="dropdown-item" href="{{ route('logout') }}">Log-out</a>
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


