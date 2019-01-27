@extends('layouts.master')

@section('title')

@endsection

@section('content')
    @include('includes.validation-messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="row">
                    <img src="/uploads/featured_images/{{ $movie->featured_image }}" alt="image_upload">
                    <h2>{{ $movie->title }}</h2>
                </div>
                <div class="row">
                    <table class="table">
                    <tr>
                        <th>Review</th>
                        <th>Bekeken op</th>
                        <th>Cijfer</th>
                    </tr>
                    <tr>
                        <td><p>{{ $movie->review }}</p></td>
                        <td>{{ $movie->date }}. <br></td>
                        <td>{{ $movie->grade }}</td>
                    </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <a href=" {{ route('movies.edit', $movie->id) }}" class="btn btn-info btn-sm">edit</a>
                    {{ Form::open(['route' => ['movies.destroy', $movie->id], 'method' => 'DELETE']) }}
                    {{ Form::submit('delete', ['class' => 'btn btn-danger btn-sm']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
