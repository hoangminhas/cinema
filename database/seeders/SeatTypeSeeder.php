<?php

namespace Database\Seeders;

use App\Models\SeatType;
use Illuminate\Database\Seeder;

class SeatTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seattype = new SeatType();
        $seattype->name = 'Ghế Thường';
        $seattype->price= '50000';
        $seattype->save();

        $seattype = new SeatType();
        $seattype->name = 'Ghế Vip';
        $seattype->price= '100000';
        $seattype->save();

        $seattype = new SeatType();
        $seattype->name = 'Ghế Love';
        $seattype->price= '200000';
        $seattype->save();


    }
}
