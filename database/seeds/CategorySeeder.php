<?php

use App\Category;
use Illuminate\Database\Seeder;
use illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Primi', 'Secondi', 'Contorni', 'Dolci', 'Antipasti' 
        ];

        foreach ($categories as $cat) {

            $category = new Category();
            $category->name = $cat;
            $category->slug = Str::slug($category->name);

            $category->save();
        }
    }
}
