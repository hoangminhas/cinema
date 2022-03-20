<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\MovieSeat;
use Illuminate\Database\Seeder;

class MovieSeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i<11; $i++) {
            for ($j=1; $j<16; $j++) {
                $movieSeat = new MovieSeat();
                $movieSeat->movie_id = $i;
                $movieSeat->seat_id = $j;
                $movieSeat->status = "null";
                // $movieSeat->status = " ";
                $movieSeat->save();
            }
        }
    }
}
