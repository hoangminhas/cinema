<?php

namespace App\Http\Controllers;

use App\Services\FoodService;
use App\Services\SeatService;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    //
    public $seatService;
    public $foodService;
    public function __construct(SeatService $seatService,
                                FoodService $foodService)
    {
        $this->seatService = $seatService;
        $this->foodService = $foodService;
    }

    public function showFormOrder()
    {
        $seats = $this->seatService->getAllSeats();
        $foods = $this->foodService->getAllFood();
        return view('frontend.movie.create', compact('seats', 'foods'));
    }

    public function orderTicket()
    {

    }
}
