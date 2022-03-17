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
        $movie->date = $request->date;
        $movie->image = $path;
        $movie->save();

        $movie->categories()->sync($request->category);
    }

    public function update($request, $id)
    {
        if($request->hasFile('image')){
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs("images", $fileName, "public");
        }

        $movie = Movie::findOrFail($id);
        $movie->name = $request->name;
        $movie->duration = $request->duration;
        $movie->summary = $request->summary;
        $movie->date = $request->date;
        $movie->image = $path ?? $movie->image;
        $movie->save();

        $movie->categories()->sync($request->category);
    }
}
