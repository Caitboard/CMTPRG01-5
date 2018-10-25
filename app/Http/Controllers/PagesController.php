<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getWelcome() {
        return view('pages.welcome');
    }
    public function getSignIn() {
        return view('pages.signin');
    }
    public function getSignUp() {
        return view('pages.signup');
    }
}
