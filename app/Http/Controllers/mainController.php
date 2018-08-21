<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Movie;
use App\Movie_genre;

class mainController extends Controller
{

    public function index() {

		$movie = movie::paginate(10);
		// $random = $movie->random(10);
		// $pagination = $movie->paginate(10);

    	return view('index')->with('random', $movie);
    }

    public function show() {
    	if (isset($_GET['genreId'])) { 
	    	
	    	$genreId = $_GET['genreId'];

	    	if ($genreId == 'action') {
	    		$movie = genre::find(28)->movie;
	    		$randomMovie = $movie->random(6);
	    	} elseif ($genreId == 'comedy') {
	    		$movie = genre::find(35)->movie;
	    		$randomMovie = $movie->random(6);
	    	} elseif ($genreId == 'drama') {
	    		$movie = genre::find(18)->movie;
	    		$randomMovie = $movie->random(6);
	    	} elseif ($genreId == 'horror') {
	    		$movie = genre::find(27)->movie;
	    		$randomMovie = $movie->random(6);
	    	} elseif ($genreId == 'sciense') {
	    		$movie = genre::find(878)->movie;
	    		$randomMovie = $movie->random(6);
	    	} else {
	    		echo "No movies found";
	    	} 
	    	return view('show')->with('movie', $randomMovie);
	    }  
    }

    public function showMovieInfo($id) {

    	$genre = movie::find($id)->genre->first();
    	$genreVal = $genre->only('id');
    	$movie = movie::where('id', $id)->get();

    	$sugestion = genre::find($genreVal['id'])->movie;
    	$sugestionResult = $sugestion->random(12);

    	return view('movieInfo')->with('movie', $movie)->with('sugestion', $sugestionResult);

    }

    public function search(Request $request) {

    	$request->validate([
    		'query' => 'required|min:3',
    		]);

    	$query = $request->input('query');
    	$searchResults = movie::where('title', 'like', "%$query%")->get();

    	return view('searchResults')->with('results', $searchResults);
    }

    public function portfolio() {
    	return view('portfolio');
    }
}
