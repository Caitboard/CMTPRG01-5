<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function()
    {
        return $this->belongsTo('App\User');
//        This post belongs to only one user, can't have multiple users
    }
}
