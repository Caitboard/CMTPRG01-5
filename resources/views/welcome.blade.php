@extends('layouts.master')
@section('title')
    {{--Entering data into the empty placeholder from master.blade--}}
    Welcome
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="first_name">Your First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                {{csrf_field()}}
                       {{--fetches the token of your session and stores it in this field to protect users from cross-site request forgery--}}
            </form>
        </div>
        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
