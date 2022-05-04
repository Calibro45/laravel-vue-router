<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function posts() {

        // relation one to many with the posts
        return $this->hasMany('App\Post');
    }
}
