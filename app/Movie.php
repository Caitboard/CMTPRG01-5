<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
//        This movie belongs to only one user, can't have multiple users
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
