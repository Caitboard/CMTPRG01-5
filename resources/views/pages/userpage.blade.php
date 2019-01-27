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
                            <th>Genre</th>
                            <th>Wijzigen</th>
                        </tr>
                        <h3>Deze films heb je al bekeken:</h3>
                            <div class="col-md-4" style="float:right">
                                {{--Searchbox, searches through the title and the body--}}
                                {{ Form::open(['route' => ['movies.search'], 'method' => 'GET', 'class'=>'form navbar-form navbar-right searchform']) }}
                                {{ method_field('get') }}
                                {{ Form::text('search', null,
                                                       array('required',
                                                            'class'=>'form-control',
                                                            'placeholder'=>'Search',
                                                            'aria-label'=>'Search',
                                                            'style'=>'margin: 6px')) }}
                                {{ Form::submit('Search',
                                    array('class'=>'btn btn-primary',
                                          'style'=>'position: absolute; left: -9999px')) }}
                                {{ Form::close() }}

                                {{--<div class="btn-group dropright">--}}
                                    {{--<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                        {{--Select genre--}}
                                    {{--</button>--}}
                                    {{--<div class="dropdown-menu">--}}
                                        {{--@foreach($categories as $category)--}}
                                            {{--<li><a href="{{ route('category', $category->id) }}">{{ $category->genre }}</a> </li>--}}
                                        {{--@endforeach--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                                @foreach($movies as $movie) @if(Auth::user() == $movie->user)
                                <tr>
                                <td><a href=" {{ route('movies.show', $movie->id) }}">{{ $movie->title }}</a></td>
                                    <td>{{ $movie->category->genre }}</td>
                                    <td>
                                        <a href=" {{ route('movies.edit', $movie->id) }}" class="btn btn-default btn-sm">edit</a>
                                        |
                                        <a href=" {{ route('movies.destroy', $movie->id) }}" class="btn btn-default btn-sm">delete</a>
                                    </td>
                                </tr>
                                @endif @endforeach
                        </table>
                    </div>
                </div>
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Nieuwe film toevoegen</a>
            </div>
        </div>
    </div>

@endsection