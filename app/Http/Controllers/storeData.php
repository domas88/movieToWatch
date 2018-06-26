<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Movie_genre;

class storeData extends Controller
{
    public function store()
    {
        $url = 'https://api.themoviedb.org/3/discover/movie?api_key=30fbb65e82996ce2086bdf884d7a690e&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1';
    	$json = file_get_contents($url);
    	$array = json_decode($json, true);

    	if (!empty($array)) {
    		foreach ($array['results'] as $key => $value) {
	    		$movie = new Movie;
	    		$movie->id = $value['id']; 		 
	    		$movie->title = $value['title'];
	    		$movie->year = $value['release_date'];
	    		$movie->genre = 1;

	    		foreach ($value['genre_ids'] as $val) {
	    			$relation = new Movie_genre;
	    			$relation->movie_id = $value['id'];
	    			$relation->genre_id = $val;
	    			$relation->save();
	    		}
	    		$movie->save();
    		}
    	}

    	return redirect('/');

    }
}
