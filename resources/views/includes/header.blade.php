<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Header</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        </div>
        {{--<ul class="nav navbar-nav navbar-right">--}}
            {{--@if (Auth::check())--}}

                {{--<li class="nav-item dropdown">--}}
                    {{--<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--Hi {{ Auth::user()->name }}--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
                        {{--<a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>--}}
                        {{--<a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>--}}
                        {{--<a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>--}}
                        {{--<a class="dropdown-item" href="{{ route('logout') }}">Log-out</a>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--@else--}}
                {{--<a href="{{ route('register') }}" class="btn btn-warning " style="margin-right: 10px" >Register</a>--}}
                {{--<a href="{{ route('login') }}" class="btn btn-primary">Login</a>--}}

            {{--@endif--}}
        {{--</ul>--}}
    </nav>
</header>