<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function Genre()
    {
    	return $this->belongsToMany('App\Genre', 'movie_genres');
    }
}
