<?php

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService extends BaseService
{
    public $orderRepository;
    public $seatService;
    public function __construct(OrderRepository $orderRepository,
                                SeatService $seatService)
    {
        $this->orderRepository = $orderRepository;
        $this->seatService = $seatService;
    }

    public function storeOrder($request)
    {
        $orderedSeats = $request->only('seats');
//        dd($orderedSeats);
        $seats = $this->seatService->getAllSeatsByMovieId($request->movie_id);
//        dd($seats[0]);
        $this->orderRepository->store($request, $seats, $orderedSeats);
    }


}
