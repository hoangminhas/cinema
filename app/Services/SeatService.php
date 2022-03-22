<?php

namespace App\Services;

use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use App\Repositories\SeatRepository;
use App\Repositories\MovieRepository;

class SeatService extends BaseService
{
    public $seatRepository;
    public $movieRepository;
    public function __construct(
        SeatRepository $seatRepository,
        MovieRepository $movieRepository
    ) {
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
        // $thisMovie = $this->movieRepository->getById($id);
        // $currentSeats = $thisMovie->seats;

        return  Movie::findOrFail($id);
    }
}
