<?php

namespace App\Services;

use App\Repositories\SeatRepository;

class SeatService extends BaseService
{
    public $seatRepository;
    public function __construct(SeatRepository $seatRepository)
    {
        $this->seatRepository = $seatRepository;
    }

    public function getAllSeats()
    {
        return $this->seatRepository->getAllByEloquent();
    }
}
