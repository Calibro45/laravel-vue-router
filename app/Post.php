<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
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

    public static function getColumnNames() {

        $columnNamesAll = Schema::getColumnListing('posts');
        $columnNames = Arr::except($columnNamesAll, ['4', '5']);

        return $columnNames;
    }

    // set date format

    public function getCustomDate($dat) {

        if ($dat) {
            $dt = Carbon::createFromFormat('Y-m-d H:i:s', $dat);
            $formatDate = $dt->format('d/m/Y');

            return $formatDate;
        }
    }

    public function getDiffFromDateForHumans($dtStart, $dtEnd) {

        $now = Carbon::createFromDate($dtStart);
        $after = $now->locale('it_IT')
            ->diffForHumans($dtEnd);

        return $after;
    }
}
