<?php

namespace App\Http\Controllers;

use App\Services\FoodService;
use App\Services\MovieService;
use App\Services\SeatService;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    //
    public $seatService;
    public $foodService;
    public $movieService;
    public function __construct(SeatService $seatService,
                                FoodService $foodService,
                                MovieService $movieService)
    {
        $this->seatService = $seatService;
        $this->foodService = $foodService;
        $this->movieService = $movieService;
    }

    public function showFormOrder($id)
    {
        $movie = $this->movieService->getMovieById($id);
        $seats = $this->seatService->getAllSeats();
        $foods = $this->foodService->getAllFood();
        return view('frontend.movie.create', compact(['seats', 'foods','movie']));
    }

    public function orderTicket(Request $request)
    {
        $orderSeats = $this->getSeats($request->seats);
        dd($orderSeats);
    }

    public function getSeats($seatIds)
    {
        $seats = $this->seatService->getSeats($seatIds);
//        dd($seats);
        return response()->json($seats)->getData();
    }
}
