@extends('layouts.master')

@section('title')

@endsection

@section('content')
    @include('includes.validation-messages')
    <div class="row">
        {{  Form::model($movie, ['route' => ['movies.update', $movie->id], 'method' => 'PUT', 'files' => true]) }}
        {{--This page is the same as show, except it's editable, so we insert our form here and bind it to our model--}}
        {{--Then we use method PUT to update our database--}}
        <div class="col-md-8">
            <div class="form-group">
            {{ Form::label('title', 'Titel') }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}
            {{--<h1>{{ $movie->title }}</h1>--}}
            </div>
            <div class="form-group">
            {{ Form::label('review', 'Review') }}
            {{ Form::textarea('review', null, ['class' => 'form-control']) }}
            {{--<p>{{ $movie->review }}</p>--}}
            </div>
            <div class="form-group">
            {{ Form::label('date', 'Bekeken op') }}
            {{ Form::date('date', null, ['class' => 'form-control']) }}
            {{--Bekeken op {{ $movie->date }}. <br>--}}
            </div>
            {{--<div class="form-group">--}}
                {{--{{ Form::label('genre', 'Genre') }}--}}
                {{--{{ Form::text('genre', null, ['class' => 'form-control']) }}--}}
            {{--</div>--}}
            <div class="form-group">
            {{ Form::label('grade', 'Je gaf de film een:') }}
            {{ Form::number('grade', null, ['class' => 'form-control']) }}
            {{--Je hebt deze film een {{ $movie->grade }} gegeven.--}}
            </div>
            <div class="form-group">
                {{ Form::label('featured_image', 'Filmafbeelding') }}
                <img src="/uploads/featured_images/{{ $movie->featured_image }}"alt="image_upload">
                {{ Form::file('featured_image', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-md-4">
            <a href=" {{ route('movies.show', $movie->id) }}" class="btn btn-danger btn-sm">Cancel</a>
            |
            {{ Form::submit('Opslaan', ['class' => 'btn btn-success btn-sm']) }}

        </div>
        {{  Form::close() }}
    </div>
@endsection
