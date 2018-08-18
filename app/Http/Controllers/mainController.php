<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Movie;
use App\Movie_genre;

class mainController extends Controller
{

    public function index() {

		$movie = movie::all();
		$random = $movie->random(10);

    	return view('index')->with('random', $random);
    }

    public function show() {
    	if (isset($_GET['genreId'])) { 
	    	
	    	$genreId = $_GET['genreId'];
	    	$gen = 0;

	    	if ($genreId == 'action') {
	    		$movie = genre::find(28)->movie;
	    		$randomMovie = $movie->random(12);
	    	} elseif ($genreId == 'comedy') {
	    		$movie = genre::find(35)->movie;
	    		$randomMovie = $movie->random(12);
	    	} elseif ($genreId == 'drama') {
	    		$movie = genre::find(18)->movie;
	    		$randomMovie = $movie->random(12);
	    	} elseif ($genreId == 'horror') {
	    		$movie = genre::find(27)->movie;
	    		$randomMovie = $movie->random(12);
	    	} elseif ($genreId == 'sciense') {
	    		$movie = genre::find(878)->movie;
	    		$randomMovie = $movie->random(12);
	    	} else {
	    		echo "No movies found";
	    	} 
	    	return view('show')->with('movie', $randomMovie)->with('gen', $gen);
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
}
