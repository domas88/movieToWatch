<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\MovieGenre;

class storeData extends Controller
{
    public function store()
    {

        for ($i = 2; $i < 20; $i++) {
            $url = 'https://api.themoviedb.org/3/discover/movie?api_key=30fbb65e82996ce2086bdf884d7a690e&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=' . $i;
            $json = file_get_contents($url);
            $array = json_decode($json, true);

            if (!empty($array)) {
                foreach ($array['results'] as $key => $value) {
                    $movie = new Movie;
                    $movie->id = $value['id'];
                    $movie->title = $value['title'];
                    $movie->img = $value['poster_path'];
                    if ($value['vote_average'] != 10 && $value['vote_average'] != 0) {
                        $movie->rating = $value['vote_average'];
                    }
                    $movie->popularity = $value['popularity'];
                    $movie->overview = $value['overview'];
                    if ($value['release_date'] != "") {
                        $movie->year = $value['release_date'];
                    } else {
                        $movie->year = '1970-01-01';
                    }

                    foreach ($value['genre_ids'] as $val) {
                        $relation = new MovieGenre;
                        $relation->movie_id = $value['id'];
                        $relation->genre_id = $val;
                        $relation->save();
                    }
                    $movie->save();
                }
            }
        }
        return redirect('/');
    }
}
