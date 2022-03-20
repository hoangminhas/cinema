<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Spatie\Searchable\Search;
use toastr;
use App\Models\Movie;
use Illuminate\Http\Request;

use App\Services\MovieService;
use App\Http\Requests\MovieRequest;

use App\Repositories\MovieRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\SeatRepository;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\This;

class MovieController extends Controller
{
    public $movieRepository;
    public $categoryRepository;
    public $movieService;
    public $seatRepository;
    public function __construct(
        MovieRepository $movieRepository,
        CategoryRepository $categoryRepository,
        MovieService $movieService,
        SeatRepository $seatRepository
    ) {
        $this->movieRepository = $movieRepository;
        $this->categoryRepository = $categoryRepository;
        $this->movieService = $movieService;
        $this->seatRepository = $seatRepository;

    }

    public function index()
    {
        $movies = $this->movieRepository->getAll();
        return view('backend.movie.index', compact('movies'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        $seats = $this->seatRepository->getAll();
        // dd($seats);
        return view('backend.movie.create', compact('categories','seats'));
    }

    public function store(MovieRequest $request)
    {
        // dd($request);
        $this->movieRepository->store($request);
        toastr()->success("Create Success");
        return redirect()->route('movie.index');
    }


    public function show($id)
    {
        //
        $movies = $this->movieRepository->showFim($id);
        return view('backend.movie.list', compact('movies'));
    }

    public function showMovieById($id)
    {
        $movie = $this->movieService->getMovieById($id);
        return view('frontend.movie.show', compact('movie'));
    }


    public function edit($id)
    {
        $movie = $this->movieRepository->getById($id);
        $categories = $this->categoryRepository->getAll();
        $seats = $this->seatRepository->getAll();
        return view('backend.movie.update', compact('movie', 'categories','seats'));
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
//        $today = \Carbon\Carbon::today('Asia/Ho_Chi_Minh')->format('Y-m-d');
//        $today = date('Y-m-d', strtotime($today));
//        $currentMovies=[];
//        $upCummingMovies=[];
//        $movies = $this->movieService->getAllMovies();
//        foreach ($movies as $movie) {
//            $dateStart = date('Y-m-d', strtotime($movie->date_start));
//            $dateEnd = date('Y-m-d', strtotime($movie->date_end));
//            if ($dateStart <= $today && $today <= $dateEnd) {
//                $currentMovies[] = $movie;
//            } if ($dateStart > $today) {
//                $upCummingMovies[] = $movie;
//            }
//        }
        $allMovies = $this->movieService->getAllMovies();
        $currentMovies = $allMovies[0];
        $upCummingMovies = $allMovies[1];


        return view('frontend.movie.index', compact(['currentMovies','upCummingMovies']));
    }

//    public function getShowingMovie()
//    {
//        $movies = $this->movieService->getShowingMovie();
//        dd($movies);
//    }

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

    public function infor()
    {
        if (Auth::check()) {
            $user = Auth::user();
            // dd($user);
            return view('frontend.user.infor', compact('user'));
        }

        return redirect()->back();
    }

    public function searchUser(Request $request)
    {
        $movies = $this->movieRepository->search($request);
        return view('frontend.movie.index', compact('movies'));
    }
}
