<?php

namespace Database\Factories;

use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name'=> $this->faker->name(),
            'duration'=> $this->faker->phoneNumber(),
            'summary'=> $this->faker->text(),
            'image' => "img/auth/cinema.jpg",
            'date_start' => $this->faker->date(),
            'date_end' => $this->faker->date()
            // 'category_id'=> Category::all()->random()->id,

        ];
    }


}
