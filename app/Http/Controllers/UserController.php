<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
//Gain access to the fields in the views with request

class UserController extends Controller
{
    public function postSignUp(Request $request)
    {
        $email = $request['email'];
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;

        $user->save();
//        Use save to write to the database
        return redirect()->back();
    }
    public function postSignIn(Request $request)
    {

    }
}
