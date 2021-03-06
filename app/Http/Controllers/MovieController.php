<?php

namespace App\Http\Controllers;

use App\Category;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Collective\Html;
use Collective\Form;
use Illuminate\Support\Facades\Auth;
use Image;

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
        return view('pages.userpage', compact('movies', 'categories'));
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
            'featured_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(400,400)->save(public_path('/uploads/featured_images/' . $filename));
            $movie->featured_image = $filename; //set image column equal to $filename
        }

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
            'featured_image' => 'image|sometimes|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $movie = Movie::find($id);
        $movie->title = $request->input('title');
        $movie->date = $request->input('date');
        $movie->grade = $request->input('grade');
        $movie->review = $request->input('review');


        if ($request->hasFile('featured_image')) {
            //add new photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/uploads/featured_images/' . $filename));
            $oldFilename = $movie->image;
            //update the database
            $movie->featured_image = $filename;
            //delete old photo
            Storage::delete($oldFilename);
        }

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
        Storage::delete($movie->featured_image);
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

    public function category($id)
    {
        $category_id = Category::find($id);
        $movies = Movie::where('category_id', $category_id)->find($id);
        $categories = Category::pluck('id');
        return view('pages.category', compact('movies', 'categories'));
//        $movie = Movie::find($id);
//        return view('pages.category')->with('movie', $movie);
//        $category = Category::find($id);
//        $movies = Movie::where('category_id', 'LIKE', '%' . $category . '%')->get();
////        $categories = Category::orderBy('genre', 'asc')->get();
////        $movies = Movie::all();
//        return view('pages.category', compact('category', 'movies'));
    }
}
