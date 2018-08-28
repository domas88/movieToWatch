<?php

namespace Movie2Watch\Http\Controllers;

use Illuminate\Http\Request;
use Movie2Watch\Genre;

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
                if ($value['name'] == 'Action') {
                    $genre->img = 'https://m.media-amazon.com/images/M/MV5BNmVmMjlmM2QtOTBkZi00MTY4LWIyMGEtZjFhZDg4NzNmYzkzXkEyXkFqcGdeQXVyNzc5NjM0NA@@._V1_.jpg';
                } elseif ($value['name'] == 'Comedy') {
                    $genre->img = 'https://m.media-amazon.com/images/M/MV5BN2YxMGNmMWQtNWRmMC00OWI1LThiMDgtMWJhY2ZmOGJjZjk2L2ltYWdlL2ltYWdlXkEyXkFqcGdeQXVyNTc3MjUzNTI@._V1_.jpg';
                } elseif ($value['name'] == 'Drama') {
                    $genre->img = 'https://m.media-amazon.com/images/M/MV5BMTk3MDAwMzcyOF5BMl5BanBnXkFtZTcwOTg5ODMyMw@@._V1_SX1520_CR0,0,1520,999_AL_.jpg';
                } elseif ($value['name'] == 'Fantasy') {
                    $genre->img = 'https://m.media-amazon.com/images/M/MV5BYTI5YTQyYTYtYmVmMC00ZDE0LWI1NzktNzAwMWQ3OWJhMzM5XkEyXkFqcGdeQXVyNzc5NjM0NA@@._V1_.jpg';
                } elseif ($value['name'] == 'Horror') {
                    $genre->img = 'https://m.media-amazon.com/images/M/MV5BMDRlMzQ3OGItZmIzNS00OTg1LThlN2ItMjQ0ZDYzZjQzYTkwXkEyXkFqcGdeQXVyNjUwNzk3NDc@._V1_.jpg';
                }
                $genre->save();
            }
        }

        return redirect('/');
    }
}
