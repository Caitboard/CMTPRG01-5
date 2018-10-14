@extends('layouts.master')

@section('content')
    <section class="row new-movie">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>Heb je een film bekeken?</h3>
                <form action="">
                    <div class="form-group">
                        <label for="title">Titel</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{ Request::old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Wanneer heb je de film bekeken?</label>
                        <div class='input-group date' id='datetimepicker3'>
                            <input type='text' class="form-control" name="date" id="date" value="{{ Request::old('date') }}"/>
                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker3').datetimepicker({
                                format: 'LT'
                            });
                        });
                    </script>
                    <div class="form-group">
                        <label for="grade">Welk cijfer geef je de film?</label>
                        <input class="form-control" type="number" name="grade" id="grade" value="{{ Request::old('grade') }}">
                    </div>
                    <div class="form-group">
                        <label for="review">Schrijf een review(optioneel)</label>
                        <input class="form-control" type="textarea" name="review" id="review" value="{{ Request::old('review') }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Upload een foto(optioneel)</label>

                    </div>
                    <button type="submit" class="btn btn-primary">Film toevoegen</button>
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
                    <a href="#">Bekijken</a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a>
                </div>
            </article>
        </div>
    </section>

@endsection
