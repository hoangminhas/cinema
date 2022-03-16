<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Hành động';
        $category->save();

        $category = new Category();
        $category->name = 'Kinh dị';
        $category->save();

        $category = new Category();
        $category->name = 'Giật gân';
        $category->save();

        $category = new Category();
        $category->name = 'Lãng mạn';
        $category->save();

        $category = new Category();
        $category->name = 'Phiêu lưu';
        $category->save();

        $category = new Category();
        $category->name = 'Anime';
        $category->save();
    }
}
