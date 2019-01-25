<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
//Gain access to the fields in the views with request
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Faker\Provider\Image;


class UserController extends Controller
{
    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
//            validating email => ' this field cannot be empty | checking if the email really is an email address using
//            laravels built-in feature | validating if this email does not already exist in the database table 'users' '
            'first_name' => 'required|max:50',
//            validating first name => 'checking if the field is not empty | max characters of 50'
            'password' => 'required|min:6'
//            validating password => 'checking if the field is not empty | minimum characters of 6'

        ]);
        $email = $request['email'];
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;

        $user->save();
//        Use save to write to the database

        Auth::login($user);
//      user logs in directly after signing up
        return redirect()->route('dashboard');
    }
    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
//      Checking if the login fields aren't empty

       if ( Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
           return redirect()->route('dashboard');
       }
       return redirect()->back()->withErrors('Login failed');
//       If the login in successful we redirect to the dashboard
//       if it's not, we go back to the welcome page, not logged in
    }

    public function getAccount(){
        return view('pages/account', ['user' => Auth::user()]);
    }

    public function saveAccount(Request $request){
//        Updating the users first name
        $this->validate($request, [
            '$first_name' => 'required'|'max:50',
        ]);
        $user = Auth::user();
        $user->first_name = $request['first_name'];
        $user->update();
//        Updating the users avatar
        $this->validate($request, [
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $name = time() . '.' . $file->getClientOriginalExtension(); //get extension in the file (jpg, png etc)
            if ($file) {
                $location = public_path('img/' . $filename); //set the location for the image (public/img)
                Image::make($file)->resize(400, 400)->save($location);
            }
        }
        return redirect()->route('account');
    }

    public function getUserImage($filename){
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
}
