<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public function movie() {
        return $this->belongsTo("App\Movie");
    }
}
