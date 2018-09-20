<!doctype html>
<html>
<head>
    <title>@yield('title')</title>
    {{--yield is een placeholder, omdat dit de basis layout is verandert dit gebied voor elke pagina
    en dus passen we die per pagina aan--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    @include('includes.header')
    <div class="container">
        @yield('content')
    </div>
</body>
</html>