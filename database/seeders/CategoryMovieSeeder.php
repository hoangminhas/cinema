<?php

namespace Database\Seeders;

use App\Models\CategoryMovie;
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
        CategoryMovie::factory(10)->create();
    }
}
