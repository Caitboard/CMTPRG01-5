@extends('layouts.master')

@section('stylesheets')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @if(count($errors) > 0)
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <section class="row new-movie">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>Heb je een film bekeken?</h3>
                <form action="{{ route('movies.store') }}" method="post">
                    <div class="form-group">
                        <label for="title">Titel</label>
                        <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ Request::old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Wanneer heb je de film bekeken?</label>
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
                        <label for="review">Schrijf een review(optioneel)</label>
                        <textarea class="form-control {{ $errors->has('review') ? 'is-invalid' : '' }}" name="review" id="review" value="{{ Request::old('review') }}"></textarea>
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
            <article class="movie">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aspernatur atque autem deserunt dolor
                    dolorem eius hic laborum laudantium mollitia nostrum numquam optio, possimus quae quam, quia
                    quibusdam quis sunt?</p>
                <div class="info">Posted by x on x-x-x</div>
                <div class="interaction">
                    <a href="#">Ik wil deze film ook zien!</a> |
                    <a href="#">Bekijken</a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a>
                </div>
            </article>
        </div>
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Welke films hebben je vrienden bekeken?</h3></header>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aspernatur atque autem deserunt dolor
                    dolorem eius hic laborum laudantium mollitia nostrum numquam optio, possimus quae quam, quia
                    quibusdam quis sunt?</p>
                <div class="info">Posted by x on x-x-x</div>
                <div class="interaction">
                    <a href="#">Ik wil deze film ook zien!</a> |
                    <a href="#">Bekijken</a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a>
                </div>
            </article>
        </div>
    </section>

@endsection
