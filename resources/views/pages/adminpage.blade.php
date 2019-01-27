@extends('layouts.master')
@section('title')
    Admin Pagina
@endsection

@section('content')
    @include('includes.validation-messages')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Users wijzigen</h1>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>User</th>
                                <th>E-mail adres</th>
                                <th>Make Admin</th>
                                <th>Verwijder user</th>
                            </tr>
                            @foreach($users as $user)
                                <tr>

                                    <td>{{  $user->first_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><a href="{{route('user.save', $user->id) }}"><button class="btn btn-default btn-sm">
                                                @if($user->admin==0)
                                                    Maak admin
                                                @else
                                                    Verwijder admin role
                                                @endif
                                            </button></a></td>
                                    <td><a href="#" class="btn btn-default btn-sm">Delete user</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection