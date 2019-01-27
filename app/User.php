<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
//    this authenticates a user
    public function movies ()
    {
        return $this->hasMany('App\Movie');
    }
}
