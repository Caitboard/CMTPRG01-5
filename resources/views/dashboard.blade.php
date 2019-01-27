@extends('layouts.master')
@section('title')
    Dashboard
@endsection

@section('stylesheets')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@include('includes.validation-messages')
    <section class="row new-movie">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>Heb je een film bekeken?</h3>
                <form action="{{ route('movies.store') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Titel</label>
                        <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ Request::old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="datepicker">Wanneer heb je de film bekeken?</label>
                        <input id="datepicker" width="276" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" name="date"/>
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap4',
                                format: 'yyyy-mm-dd'
                            });
                        </script>
                    </div>

                    <div class="form-group">
                        <label for="grade">Welk cijfer geef je de film?</label>
                        <input class="form-control {{ $errors->has('grade') ? 'is-invalid' : '' }}" type="number" name="grade" id="grade" value="{{ Request::old('grade') }}">
                    </div>
                    <div class="form-group">
                        <label for="genre">Welk genre heeft de film?</label>
                        <input class="form-control {{ $errors->has('genre') ? 'is-invalid' : '' }}" type="text" name="genre" id="genre" value="{{ Request::old('genre') }}">
                    </div>
                    <div class="form-group">
                        <label for="review">Schrijf een review(optioneel)</label>
                        <textarea class="form-control {{ $errors->has('review') ? 'is-invalid' : '' }}" name="review" id="review" value="{{ Request::old('review') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="featured_image">Upload een afbeelding van de film(optioneel)</label>
                        <input type="file" name="featured_image" class="form-control" id="featured_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Film toevoegen</button>
                    {{ csrf_field() }}
                </form>
            </header>
        </div>
    </section>
    <section class="row movies">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Welke films hebben je vrienden bekeken?</h3></header>
            @foreach($movies as $movie)
                <article class="movie">
                    <p> {{ $movie->user->first_name }} heeft de film "{{ $movie->title }}" bekeken. <br>
                        {{ $movie->user->first_name }} geeft deze film een {{ $movie->grade }}
                    </p>
                    <div class="info">Posted by {{ $movie->user->first_name }} on {{ $movie->created_at }}</div>
                    <div class="interaction">
                        <a href="#">Ik wil deze film ook zien!</a> |
                        <a href="{{ route('movies.show', $movie->id) }}">Bekijken</a>
                        @if(Auth::user() == $movie->user)
                            |
                            <a href="{{ route('movies.edit', $movie->id) }}">Edit</a> |
                            <a href="{{ route('movies.destroy', $movie->id) }}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>

@endsection
