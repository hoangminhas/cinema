<?php

namespace App\Repositories;

use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class MovieRepository extends BaseRepository
{

    public function getTable()
    {
        return 'movies';
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    // public function getAll()
    // {
    //     // return DB::table($this->table)
    //     // ->join('')
    // }

}
