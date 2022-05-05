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
        'slug',
        'category_id',
        'tag_id'
    ];

    //* one to many inverse relation with category *//

    public function category() {

        // one to many inverse
        return $this->belongsTo('App\Category');
    }

    //* many to many relation with tags *//

    public function tags() {
        
        return $this->belongsToMany('App\Tag');
    }

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

    public function checkTagKey($key, $array) {

        if(array_key_exists($key, $array)) {

            $this->tags()->sync($array[$key]);

        } else {

            $this->tags()->sync([]);
        };
    }
}
