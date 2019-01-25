@extends('layouts.master')


@section('content')
    @include('includes.validation-messages')
    @if (count($articles) === 0)
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1 style="color:red">{{ $error }}</h1>
                </div>

            </div>
            @elseif (count($articles) >= 1)
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <h1>{{ $articles->count()}} movie found</h1>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <table class="table">
                                    <tr>
                                        <th>Titel</th>
                                        <th>Wijzigen</th>
                                    </tr>
                                    @foreach($articles as $article) @if(Auth::user() == $article->user)
                                        <tr>
                                            <td><a href=" {{ route('movies.show', $article->id) }}">{{ $article->title }}</a></td>
                                            <td>
                                                <a href=" {{ route('movies.edit', $article->id) }}" class="btn btn-default btn-sm">edit</a>
                                                |
                                                <a href=" {{ route('movies.destroy', $article->id) }}" class="btn btn-default btn-sm">delete</a>
                                            </td>
                                        </tr>
                                    @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>


@endsection
