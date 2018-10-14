<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
//Gain access to the fields in the views with request



class MovieController extends Controller
{
    public function movieCreateMovie(Request $request)
    {
        $movie = new Movie();
        $movie->title = $request['title'];
        $movie->date = $request['date'];
        $movie->grade = $request['grade'];
        $movie->review = $request['review'];
        $movie->image = $request['image'];
        $request->user()->movies()->save($movie);
//        saves this post as related to the currently authenticated user
        return redirect()->route('dashboard');
    }
}