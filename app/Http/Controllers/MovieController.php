<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;

use App\Repositories\CategoryRepository;
use App\Repositories\MovieRepository;
use App\Services\MovieService;

use Illuminate\Http\Request;
// use App\Repositories\MovieRepository;
// use App\Repositories\CategoryRepository;

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

    public function store(MovieRequest $request)
    {
       $this->movieRepository->store($request);
       return redirect()->route('movie.index');
    }


    public function show($id)
    {
        $movies = $this->movieRepository->showFim($id);
        // dd($movies);
        return view('backend.movie.list',compact('movies'));
    }


    public function edit($id)
    {
        // $movie = Movie::findOrFail($id);
        $movie = $this->movieRepository->getById($id);
        $categories = $this->categoryRepository->getAll();
        // dd($movie);
        return view('backend.movie.update',compact('movie','categories'));
    }

    public function update(MovieRequest $request, $id)
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

    public function showFormOrder()
    {
        return view('frontend.movie.create');
    }
}
