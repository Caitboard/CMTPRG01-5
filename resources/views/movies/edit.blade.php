@extends('layouts.master')

@section('title')

@endsection

@section('content')
    <div class="row">
        {!!  Form::model() !!}
        <div class="col-md-8">
            <h1>{{ $movie->title }}</h1>
            <p>{{ $movie->review }}</p>
            Bekeken op {{ $movie->date }}. <br>
            Je hebt deze film een {{ $movie->grade }} gegeven.
        </div>
        <div class="col-md-4">
            <a href=" {{ route('movies.show', $movie->id) }}" class="btn btn-danger btn-sm">Cancel</a>
            |
            <a href=" {{ route('movies.update', $movie->id) }}" class="btn btn-success btn-sm">Save</a>
        </div>
        {!!  Form::close() !!}
    </div>
@endsection
