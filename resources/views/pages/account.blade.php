@extends('layouts.master')
@section('title')
    Account
@endsection

@section('content')
    @include('includes.validation-messages')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Your Account</h3></header>
            <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
                {{ csrf_field() }}
            </form>
        </div>
    </section>
        <section class="row new-post">
            <div class="col-md-6 col-md-offset-3">
                <img src="{{ asset('img/'. $user->file) }}" height="200" width="300" alt="image_upload">
            </div>
        </section>
@endsection