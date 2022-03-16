<?php

namespace Database\Seeders;

use App\Models\Category;
// use App\Models\food;
use App\Models\Movie;
use App\Models\Order;
use App\Models\Role;
use App\Models\Seat;
use App\Models\SeatTpye;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            SeatTypeSeeder::class,
            SeatSeeder::class,
            CategorySeeder::class,
            MovieSeeder::class,
            FoodSeeder::class,
            OrderSeeder::class
        ]);
    }
}
