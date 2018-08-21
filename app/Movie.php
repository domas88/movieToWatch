<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	use Searchable;
	
    public function Genre()
    {
    	return $this->belongsToMany('App\Genre', 'movie_genres');
    }
}
