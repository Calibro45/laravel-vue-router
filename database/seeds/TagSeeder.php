<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Carne', 'Pesce', 'Senza Glutine', 'Senza Lattosio', 'Vegetariano', 'Vegano'
        ];

        foreach($tags as $name) {

            Tag::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        };
    }
}
