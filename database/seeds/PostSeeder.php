<?php

use App\Category;
use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        // recovery collection category & the value all key
        $categories = Category::all();
        $catId = $categories->pluck('id')
            ->all();

        // ciclo per popolare migration

        for ($i=0; $i < 100 ; $i++) { 
            
            $post = new Post();

            $post->title = $faker->words(8, true);
            $post->slug = Str::slug($post->title);
            $post->content = $faker->paragraphs(8, true);
            $post->published_at = $faker->optional()->dateTime();
            $post->category_id = $faker->optional()->randomElement($catId);

            $post->save();
        }   
    }
}
