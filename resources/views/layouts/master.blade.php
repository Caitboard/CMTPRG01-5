<!doctype html>
<html>
<head>
    <title>@yield('title')</title>
    {{--yield is een placeholder, omdat dit de basis layout is verandert dit gebied voor elke pagina
    en dus passen we die per pagina aan--}}
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>