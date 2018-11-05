@extends('layouts.master')
@section('title')
    {{--Entering data into the empty placeholder from master.blade--}}
    Welcome
@endsection

@section('content')
    @include('includes.validation-messages')
    {{--With this if statement we check all the fields in the sign up form and display errors
    based on our validation in the UserController--}}
    <div class="row">
        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="{{ route('signin') }}" method="post">
                <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection