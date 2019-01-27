@extends('layouts.master')

@section('title')

@endsection

@section('content')
    @include('includes.validation-messages')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $movie->title }}</h1>
            <h3>{{ $movie->category->genre }}</h3>
            <p>{{ $movie->review }}</p>

            Bekeken op {{ $movie->date }}. <br>
            <img src="/uploads/featured_images/{{ $movie->featured_image }}"  height="300" width="300" alt="image_upload">
            {{ Auth::user()->first_name }} heeft deze film een {{ $movie->grade }} gegeven.
        </div>
        <div class="col-md-4">
            <a href=" {{ route('movies.edit', $movie->id) }}" class="btn btn-info btn-sm">edit</a>
            {{ Form::open(['route' => ['movies.destroy', $movie->id], 'method' => 'DELETE']) }}
            {{ Form::submit('delete', ['class' => 'btn btn-danger btn-sm']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection
