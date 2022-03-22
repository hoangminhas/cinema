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
        $category->color = 'primary';
        $category->save();

        $category = new Category();
        $category->name = 'Kinh dị';
        $category->color = 'dark';
        $category->save();

        $category = new Category();
        $category->name = 'Giật gân';
        $category->color = 'info';
        $category->save();

        $category = new Category();
        $category->name = 'Lãng mạn';
        $category->color = 'danger';
        $category->save();

        $category = new Category();
        $category->name = 'Phiêu lưu';
        $category->color = 'success';
        $category->save();

        $category = new Category();
        $category->name = 'Anime';
        $category->color = 'warning';
        $category->save();
    }
}
