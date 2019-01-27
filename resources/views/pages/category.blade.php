@extends('layouts.master')

@section('content')
    @include('includes.validation-messages')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table">
                            {{--<tr>--}}
                                {{--<th>Titel</th>--}}
                                {{--<th>Genre</th>--}}
                                {{--<th>Wijzigen</th>--}}
                            {{--</tr>--}}



                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection