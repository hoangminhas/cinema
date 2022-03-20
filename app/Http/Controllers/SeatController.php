<?php

namespace App\Http\Controllers;

use App\Services\FoodService;
use App\Services\MovieSeatService;
use App\Services\MovieService;
use App\Services\OrderService;
use App\Services\SeatService;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    //
    public $seatService;
    public $foodService;
    public $movieService;
    public $orderService;
    public $movieController;
    public function __construct(SeatService $seatService,
                                FoodService $foodService,
                                MovieService $movieService,
                                OrderService $orderService,
                                MovieController $movieController)
    {
        $this->seatService = $seatService;
        $this->foodService = $foodService;
        $this->movieService = $movieService;
        $this->orderService = $orderService;
        $this->movieController = $movieController;
    }

    public function showFormOrder($id)
    {
        $movie = $this->movieService->getMovieById($id);
        $dateRange = $this->movieService->getAllDatesOfMovieById($id)->toArray();
        $seats = $this->seatService->getAllSeatsByMovieId($id);
        $foods = $this->foodService->getAllFood();
        return view('frontend.movie.create', compact(['seats', 'foods', 'movie', 'dateRange']));
    }

    public function orderTicket(Request $request)
    {
//            dd($request->user_id);
//        $orderSeats = $this->getSeats($request->seats);
        $this->orderService->storeOrder($request);
        return view('frontend.movie.ticket');
    }

    public function getSeats($seatIds)
    {
        $seats = $this->seatService->getSeats($seatIds);
        return response()->json($seats)->getData();
    }
}
