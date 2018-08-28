<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Movie;
use App\MovieGenre;

class mainController extends Controller
{
    public function index()
    {
        $movie = movie::paginate(10);
        $genre = genre::all();

        return view('index')->with('random', $movie)->with('genre', $genre);
    }

    public function show($genreId)
    {
        $genre = genre::all();
        $movie = genre::find($genreId)->movie;
        $randomMovie = $movie->random(13);

        return view('show')->with('movie', $randomMovie)->with('genre', $genre);
    }

    public function showMovieInfo($id)
    {
        $genre = movie::find($id)->genre->first();
        $genreVal = $genre->only('id');
        $sugestion = genre::find($genreVal['id'])->movie;
        $sugestionResult = $sugestion->random(12);

        $movie = movie::where('id', $id)->get();
        $genreAll = genre::all();

        return view('movieInfo')->with('movie', $movie)->with('sugestion', $sugestionResult)->with('genre', $genreAll);
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');
        $searchResults = movie::where('title', 'like', "%$query%")->get();

        return view('searchResults')->with('results', $searchResults);
    }

    public function portfolio()
    {
        return view('portfolio');
    }
}
