@extends('layouts.master')

@section('content')
    @include('includes.validation-messages')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Welkom {{ Auth::user()->first_name }}</h1>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                        <tr>
                            <th>Titel</th>
                            <th>Wijzigen</th>
                        </tr>
                        <h3>Deze films heb je al bekeken:</h3>
                        @foreach($movies as $movie)
                        <tr>
                        <td><a href=" {{ route('movies.show', $movie->id) }}">{{ $movie->title }}</a></td>
                            <td>
                                <a href=" {{ route('movies.edit', $movie->id) }}" class="btn btn-default btn-sm">edit</a>
                                |
                                <a href=" {{ route('movies.destroy', $movie->id) }}" class="btn btn-default btn-sm">delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Nieuwe film toevoegen</a>

            </div>
        </div>
    </div>

@endsection