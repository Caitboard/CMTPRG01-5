<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Collective\Html;
use Collective\Form;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('pages.userpage', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::latest()->get();
        return view('dashboard', ['movies' => $movies]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'date' => 'required|date|before:tomorrow',
            'grade' => 'required|integer|between:1,10',
            'review' => 'max:1000|sometimes',
        ]);
        $title = $request['title'];
        $date = $request['date'];
        $grade = $request['grade'];
        $review = $request['review'];

        $movie = new Movie();
        $movie->title = $title;
        $movie->date = $date;
        $movie->grade = $grade;
        $movie->review = $review;
        $message = 'Er is iets fout gegaan';

        if ($request->user()->movies()->save($movie)) {
            $message = 'Film toegevoegd!';
        }

        return redirect()->route('dashboard')->with(['message' => $message]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        return view('movies.show')->with('movie', $movie);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $movie = Movie::find($id);
        if(Auth::user() != $movie->user) {
            return redirect()->back();
        }
        return view('movies.edit')->with('movie', $movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'date' => 'required|date|before:tomorrow',
            'grade' => 'required|integer|between:1,10',
            'review' => 'max:1000|sometimes',
        ]);

        $movie = Movie::find($id);
        $movie->title = $request->input('title');
        $movie->date = $request->input('date');
        $movie->grade = $request->input('grade');
        $movie->review = $request->input('review');

        $message = 'Er is iets fout gegaan';

        if ($request->user()->movies()->save($movie)) {
            $message = 'Review gewijzigd!';
        }

        return redirect()->route('movies.show', $movie->id)->with(['message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if(Auth::user() != $movie->user) {
            return redirect()->back();
        }
        $message = 'Er is iets misgegaan!';
        if($movie->delete()) {
            $message = 'De film is uit je lijst verwijderd';
        }
        return redirect()->route('userpage')->with(['message' => $message]);
    }

    public function search(Request $request)
    {
        $error = "Geen film gevonden";
        // Gets the query string from our form submission
        $query = $request->input('search');
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $articles = Movie::where('title', 'LIKE', '%' . $query . '%' )->orWhere('review','LIKE', '%' . $query . '%' )->get();
        // returns a view and passes the view the list of articles and the original query.
        return view('movies.search', compact('articles', 'query', 'error'));
    }

}
