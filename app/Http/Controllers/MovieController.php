<?php

namespace App\Http\Controllers;

use App\Models\Movie;

use App\Repositories\CategoryRepository;
use App\Repositories\MovieRepository;
use App\Services\MovieService;

use Illuminate\Http\Request;


class MovieController extends Controller
{
    public $movieRepository;
    public $categoryRepository;
    public $movieService;
    public function __construct(MovieRepository $movieRepository,
                                CategoryRepository $categoryRepository,
                                MovieService $movieService
    )
    {
        $this->movieRepository = $movieRepository;
        $this->categoryRepository = $categoryRepository;
        $this->movieService = $movieService;
    }

    public function index()
    {
        $movies = $this->movieRepository->getAll();
        // dd($movies[3]->categories);
        return view('backend.movie.index',compact('movies'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        // dd($categories);
        return view('backend.movie.create' , compact('categories'));
    }

    public function store(Request $request)
    {
       $this->movieRepository->store($request);
       return redirect()->route('movie.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        // $movie = Movie::findOrFail($id);
        $movie = $this->movieRepository->getById($id);
        $categories = $this->categoryRepository->getAll();
        // dd($movie);
        return view('backend.movie.update',compact('movie','categories'));
    }

    public function update(Request $request, $id)
    {
        $this->movieRepository->update($request,$id);
        return redirect()->route('movie.index');
    }

    public function destroy($id)
    {
        $this->movieRepository->delete($id);
        return redirect()->route('movie.index');
    }

    public function indexMovies()
    {
        $movies = $this->movieService->getAllMovie();
        return view('frontend.movie.index', compact('movies'));
    }

}
