<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

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

        return Movie::all()->sortByDesc('id')->values();
    }

    public function getById($id)
    {
        // return DB::table($this->table)
        // ->join('category_movies', 'category_movies.movie_id' , '=','movies.id')
        // ->join('categories','categories.id','=','category_movies.category_id')
        // ->select('movies.*','categories.name as categoryname')
        // ->where('movies.id',$id)->first();

        return Movie::findOrFail($id);
    }

    public function store($request)
    {
        // $data = $request->only('content','user_id');
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs("images", $fileName, "public");
        } else {
            $path = "images/default.jpg";
        }

        $movie = new Movie();
        $movie->name = $request->name;
        $movie->duration = $request->duration;
        $movie->summary = $request->summary;
        $movie->date_start = $request->date_start;
        $movie->date_end = $request->date_end;
        $movie->image = $path;
        $movie->save();

        $movie->categories()->sync($request->category);
        $movie->seats()->sync($request->seat);
    }


    public function update($request, $id)
    {
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs("images", $fileName, "public");
        }

        $movie = Movie::findOrFail($id);
        $movie->name = $request->name;
        $movie->duration = $request->duration;
        $movie->summary = $request->summary;
        $movie->date_start = $request->date_start ?? $movie->date_start;
        $movie->date_end = $request->date_end ?? $movie->date_end;
        $movie->image = $path ?? $movie->image;
        $movie->save();

        $movie->categories()->sync($request->category);
        $movie->seats()->sync($request->seat);
    }

    public function delete($id)
    {
        DB::table('orders')->where('movie_id',$id)->delete();
        DB::table('category_movie')->where('movie_id', $id)->delete();
        DB::table('movie_seat')->where('movie_id',$id)->delete();
        DB::table($this->table)->where('id', $id)->delete();
    }

    public function showFim($id)
    {
        return DB::table($this->table)
            ->join('category_movie', 'category_movie.movie_id', '=', 'movies.id')
            ->join('categories', 'categories.id', '=', 'category_movie.category_id')
            ->where('categories.id', $id)
            ->select('movies.*', 'categories.name as category', 'categories.color as color')->orderBy('movies.id', 'DESC')->get();

        // return Category::findOrFail($id);
    }

    public function search($request)
    {
        $search = $request->input('search');
        return Movie::query()
            ->where('movies.name', 'LIKE', "%{$search}%")
            ->get();
    }

    // public function searchUser($request)
    // {
    //     $search = $request->input('search');
    //     return Movie::query()
    //         ->where('movies.name', 'LIKE', "%{$search}%")
    //         ->get();
    // }


}
