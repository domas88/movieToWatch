<?php

namespace Movie2Watch;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function Genre()
    {
    	return $this->belongsToMany('Movie2Watch\Genre', 'movie_genres');
    }
}
