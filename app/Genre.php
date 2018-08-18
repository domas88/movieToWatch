<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function Movie()
    {
    	return $this->belongsToMany('App\Movie', 'movie_genres');
    }
}
