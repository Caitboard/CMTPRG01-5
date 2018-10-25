@extends('layouts.master')
@section('title')
    {{--Entering data into the empty placeholder from master.blade--}}
    Welcome
@endsection

{{--@section('content')--}}
    {{--@if(count($errors) > 0)--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-4 col-md-offset-4">--}}
            {{--<ul>--}}
                {{--@foreach($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--@endif--}}
    {{--With this if statement we check all the fields in the sign up form and display errors--}}
    {{--based on our validation in the UserController--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-6">--}}
            {{--<h3>Sign Up</h3>--}}
            {{--<form action="{{ route('signup') }}" method="post">--}}
                {{--<div class="form-group">--}}
                    {{--<label for="email">Your E-Mail</label>--}}
                    {{--<input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ Request::old('email') }}">--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="first_name">Your First Name</label>--}}
                    {{--<input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ Request::old('first_name') }}">--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="password">Your Password</label>--}}
                    {{--<input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">--}}
                {{--</div>--}}
                {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
                {{--{{ csrf_field() }}--}}
                       {{--fetches the token of your session and stores it in this field to protect users from cross-site request forgery--}}
            {{--</form>--}}
        {{--</div>--}}
        {{--<div class="col-md-6">--}}
            {{--<h3>Sign In</h3>--}}
            {{--<form action="{{ route('signin') }}" method="post">--}}
                {{--<div class="form-group">--}}
                    {{--<label for="email">Your E-Mail</label>--}}
                    {{--<input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ Request::old('email') }}">--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="password">Your Password</label>--}}
                    {{--<input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">--}}
                {{--</div>--}}
                {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
                {{--{{ csrf_field() }}--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}
