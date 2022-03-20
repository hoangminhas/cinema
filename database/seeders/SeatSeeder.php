<?php

namespace Database\Seeders;

use App\Models\Seat;
use App\Models\SeatTpye;
use App\Models\SeatType;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['A','B','C'];
        // $arr1 = ['null','notnull'];

        for ($i=0; $i < count($arr) ; $i++) {
            for ($j=1; $j < 11; $j++) {
                $seats = new Seat();
                $seats->name = $arr[$i]. $j ;
//                $seats->status = 'null';
                $seats->seattype_id = SeatType::all()->random()->id;
                $seats->save();
            }
        }
    }
}
