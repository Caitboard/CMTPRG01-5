@extends('layouts.master')

@section('title')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $movie->title }}</h1>
            <p>{{ $movie->review }}</p>
            Bekeken op {{ $movie->date }}. <br>
            Je hebt deze film een {{ $movie->grade }} gegeven.
        </div>
        <div class="col-md-4">
            <a href=" {{ route('movies.edit', $movie->id) }}" class="btn btn-info btn-sm">edit</a>
            |
            <a href=" {{ route('movies.destroy', $movie->id) }}" class="btn btn-danger btn-sm">delete</a>
        </div>
    </div>
@endsection