<?php

namespace App\Services;

use App\Repositories\MovieRepository;
use App\Repositories\SeatRepository;

class SeatService extends BaseService
{
    public $seatRepository;
    public $movieRepository;
    public function __construct(SeatRepository $seatRepository,
                                MovieRepository $movieRepository)
    {
        $this->seatRepository = $seatRepository;
        $this->movieRepository = $movieRepository;
    }

    public function getAllSeats()
    {
        return $this->seatRepository->getAllByEloquent();
    }

    public function getSeats($seatIds)
    {
        return $this->seatRepository->getSeats($seatIds);
    }

    public function getAllSeatsByMovieId($id)
    {
        $thisMovie = $this->movieRepository->getById($id);
        $currentSeats = $thisMovie->seats;
        return $currentSeats;
    }


}
