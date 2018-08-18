<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Movie;
use App\Movie_genre;

class MoviesController extends Controller
{
    public function show()
    {
    	$info = new genre;
    	$info = genre::all();

    	return view('welcome')->with('info', $info);	
    }

    public function find() {
    	return view('show');
    }
}
