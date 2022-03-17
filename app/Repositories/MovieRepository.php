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
        return Movie::class;
    }

    public function getAllByEloquent()
    {
        return $this->model::all();
    }
    // public function getAll()
    // {
    //     // return DB::table($this->table)
    //     // ->join('')
    // }

    public function getAll()
    {
        // return DB::table($this->table)
        // ->join('category_movies', 'category_movies.movie_id' , '=','movies.id')
        // ->join('categories','categories.id','=','category_movies.category_id')
        // ->select('movies.*','categories.name as categoryname')
        // ->orderByDesc('movies.id')->get();

        return Movie::all();
    }

    public function getById($id)
    {
        return DB::table($this->table)
        ->join('category_movies', 'category_movies.movie_id' , '=','movies.id')
        ->join('categories','categories.id','=','category_movies.category_id')
        ->select('movies.*','categories.name as categoryname')
        ->where('movies.id',$id)->first();
    }


}
