<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie_details extends Model
{
    public function movies(){
        return $this->belongsTo("App\Movie");
    }
}
