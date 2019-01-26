@extends('layouts.master')
@section('title')
    Account
@endsection

@section('content')
    @include('includes.validation-messages')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                <h2>{{ $user->first_name }}'s Profile</h2>
                <form enctype="multipart/form-data" action="{{ route('account.save') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
                    </div>
                    <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" class="form-control" id="avatar">
                    </div>
                    <button type="submit" class="pull-right btn btn-sm btn-primary">Save Account</button>
                </form>
            </div>
        </div>
    </div>
@endsection