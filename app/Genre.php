<?php

namespace Movie2Watch;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function Movie()
    {
    	return $this->belongsToMany('Movie2Watch\Movie', 'movie_genres');
    }
}
