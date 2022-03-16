<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $food = new Food();
        // $food = new ;
        $food->image = 'img/ashjkdfhajks';
        $food->name = 'Bỏng ngô';
        $food->price = '30000';
        $food->save();

        $food = new Food();
        $food->image = 'img/asdfggdfgjks';
        $food->name = 'Combo Bỏng , Nước';
        $food->price = '50000';
        $food->save();

        $food = new Food();
        $food->image = 'img/ashjktỳyhghjks';
        $food->name = 'Nước';
        $food->price = '20000';
        $food->save();



    }
}
