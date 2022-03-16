<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryMovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::all()->random()->id,
            'movie_id' => Movie::all()->random()->id,
        ];
    }
}
