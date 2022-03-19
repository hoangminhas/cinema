<?php

namespace App\Services;

use App\Repositories\MovieRepository;

class MovieService extends BaseService
{
    public $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getAllMovie()
    {
        return $this->movieRepository->getAllByEloquent();
    }

    public function getMovieById($id)
    {
        return $this->movieRepository->getById($id);
    }
}
