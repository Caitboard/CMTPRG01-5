<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
//Gain access to the fields in the views with request
use Illuminate\Support\Facades\Storage;



class MovieController extends Controller
{
    public function postCreateMovie(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'date' => 'required|date',
            'grade' => 'required|digits_between:1,11',
            'review' => 'max:1000|sometimes',
            'image' => 'sometimes|image'
        ]);
        $title = $request['title'];
        $date = $request['date'];
        $grade = $request['grade'];
        $review = $request['review'];
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension(); //get extension in the file (jpg, png etc)
        if ($image) {
            Storage::disk('local')->put($filename, File::get($image));
        }

        $movie = new Movie();
        $movie->title = $title;
        $movie->date = $date;
        $movie->grade = $grade;
        $movie->review = $review;

//        if ($request->hasFile('image')) {
//            $image = $request->file('image');
//            $filename = time() . '.' . $image->getClientOriginalExtension(); //get extension in the file (jpg, png etc)
//            $location = public_path('img/' . $filename); //set the location for the image (public/img)
//            Image::make($image)->resize(400, 400)->save($location); //create image object, resize the image, save it in public/img
//            $movie->image = $filename; //set image column equal to $filename
//        }

        $request->user()->movies()->save($movie);
//        saves this post as related to the currently authenticated user
        return redirect()->route('dashboard');
    }
}