<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class storeGenreData extends Controller
{
	public function store()
	{
	    $url = 'https://api.themoviedb.org/3/genre/movie/list?api_key=30fbb65e82996ce2086bdf884d7a690e&language=en-US';
	    $json = file_get_contents($url);
	    $array = json_decode($json, true);

	    if (!empty($array)) {
	    	foreach ($array['genres'] as $key => $value) {
	    		$genre = new Genre;
	    		$genre->id = $value['id'];
	    		$genre->name = $value['name'];
	    		$genre->save();
	    	}
	    }

	    return redirect('/');

	}	
}
