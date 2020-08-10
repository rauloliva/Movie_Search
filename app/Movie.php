<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function movie_details() {
        return $this->hasOne("App\Movie_details");
    }

    public function reviews() {
        return $this->hasMany('App\Reviews');
    }

    public function images() {
        return $this->hasMany('App\Images');
    }
}
