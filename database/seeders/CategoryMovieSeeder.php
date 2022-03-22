<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // CategoryMovie::factory(10)->create();
        $this->addCategoryToMovie();
    }

    public function addCategoryToMovie()
    {
        $movies = Movie::all();
        foreach ($movies as $movie) {
            $categories = Category::all();
            foreach ($categories->random(rand(1, $categories->count())) as $category) {
                $movie->categories()->attach($category);
            }
        }
    }
}
