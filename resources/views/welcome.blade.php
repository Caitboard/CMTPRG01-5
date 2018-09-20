@extends('layouts.master')

@section('title')
    {{--Hierin gaan we de lege placeholder aanpassen voor alleen deze pagina--}}
    Welcome
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="first_name">Your First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name">
                </div>
                <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
            </form>

        </div>
    </div>
@endsection
