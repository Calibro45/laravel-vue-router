<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'published_at',
        'slug'
    ];

    public static function getUniqueSlug($title) {

        // creazione slug 

        $slug = Str::slug($title);
        $slugBase = $slug;
        $counter = 1;
        
        $post_present = Post::where('slug', $slug)->first();

        // controllo slug esiste

        while ($post_present) {

            $slug = $slugBase . '-' . $counter;
            $counter++;
            $post_present = Post::where('slug', $slug)->first();
        };

        return $slug;
    }
}
