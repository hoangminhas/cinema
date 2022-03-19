<?php

namespace App\Http\Controllers;

use Spatie\Searchable\Search;
use toastr;
use App\Models\Movie;
use Illuminate\Http\Request;

use App\Services\MovieService;
use App\Http\Requests\MovieRequest;

use App\Repositories\MovieRepository;
use App\Repositories\CategoryRepository;





class MovieController extends Controller
{
    public $movieRepository;
    public $categoryRepository;
    public $movieService;
    public function __construct(
        MovieRepository $movieRepository,
        CategoryRepository $categoryRepository,
        MovieService $movieService
    ) {
        $this->movieRepository = $movieRepository;
        $this->categoryRepository = $categoryRepository;
        $this->movieService = $movieService;
    }

    public function index()
    {
        $movies = $this->movieRepository->getAll();
        return view('backend.movie.index', compact('movies'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        return view('backend.movie.create', compact('categories'));
    }

    public function store(MovieRequest $request)
    {
        $this->movieRepository->store($request);
        toastr()->success("Create Success");
        return redirect()->route('movie.index');
    }


    public function show($id)
    {
        $movies = $this->movieRepository->showFim($id);
        return view('backend.movie.list', compact('movies'));
    }


    public function edit($id)
    {
        $movie = $this->movieRepository->getById($id);
        $categories = $this->categoryRepository->getAll();
        return view('backend.movie.update', compact('movie', 'categories'));
    }

    public function update(MovieRequest $request, $id)
    {
        $this->movieRepository->update($request, $id);
        toastr()->success("Update Success");
        return redirect()->route('movie.index');
    }

    public function destroy($id)
    {
        $this->movieRepository->delete($id);
        toastr()->error('Delete Success');
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

    public function home()
    {
        $movies = $this->movieRepository->getAll();
        return view('backend.movie.home', compact('movies'));
    }
    public function search(Request $request)
    {
        $movies = $this->movieRepository->search($request);
        return view('backend.movie.index', compact('movies'));
    }

}
