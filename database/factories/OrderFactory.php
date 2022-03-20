<?php

namespace Database\Factories;

use App\Models\Food;
use App\Models\Seat;
use App\Models\User;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTime(),
            'user_id'=> User::all()->random()->id,
            'movie_id'=> Movie::all()->random()->id,
//            'seat_id'=> Seat::all()->random()->id,
//            'food_id'=> Food::all()->random()->id
        ];
    }
}
