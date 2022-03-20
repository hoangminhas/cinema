<?php

namespace App\Services;

use App\Repositories\MovieRepository;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class MovieService extends BaseService
{
    public $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getAllDatesOfMovieById($id)
    {
        $movie = $this->movieRepository->getById($id);
        $dateStart = date('Y-m-d', strtotime($movie->date_start));
        $dateEnd = date('Y-m-d', strtotime($movie->date_end));
        $dateRange = CarbonPeriod::create($dateStart, $dateEnd);
        return $dateRange;
    }

    public function getAllMovies(): array
    {
        $today = Carbon::today('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $today = date('Y-m-d', strtotime($today));
        $currentMovies=[];
        $upCummingMovies=[];
        $movies = $this->movieRepository->getAllByEloquent();
        foreach ($movies as $movie) {
            $dateStart = date('Y-m-d', strtotime($movie->date_start));
            $dateEnd = date('Y-m-d', strtotime($movie->date_end));
            if ($dateStart <= $today && $today <= $dateEnd) {
                $currentMovies[] = $movie;
            } if ($dateStart > $today) {
                $upCummingMovies[] = $movie;
            }
        }
        return [$currentMovies, $upCummingMovies];
    }

    public function getMovieById($id)
    {
        return $this->movieRepository->getById($id);
    }

}
