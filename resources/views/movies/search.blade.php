@extends('layouts.master')


@section('content')
    @include('includes.validation-messages')
    @if (count($articles) === 0)
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1 style="color:red">Sorry! Searched item can not be found</h1>
                    <p>Please try again</p>
                </div>

            </div>
            @elseif (count($articles) >= 1)
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <h1>{{ $articles->count()}} articles found</h1>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                            @foreach($articles as $article) @if(Auth::user() == $article->user)
                                {{ $article->title }}
                            @endif @endforeach
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    @endif

@endsection
