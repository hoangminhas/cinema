<?php

namespace App\Repositories;

use App\Models\Seat;

class SeatRepository extends BaseRepository
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Seat::class;
    }

    public function getTable()
    {
        // TODO: Implement getTable() method.
        return 'seats';
    }

    public function getSeats($seatIds)
    {
        return $this->model::whereIn('name',$seatIds)->get();
    }



}
