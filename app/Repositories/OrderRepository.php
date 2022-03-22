<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderRepository extends BaseRepository
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Order::class;
    }

    public function getTable()
    {
        // TODO: Implement getTable() method.
    }

    public function store($request, $seats, $orderedSeats)
    {
        $seats = $seats->seats;
        foreach ($orderedSeats as $orderedSeat) {
            for ($i = 0; $i < count($orderedSeat); $i++) {
                $seatId = $orderedSeat[$i];
                $movieId = $seats[0]->pivot->movie_id;
                DB::table('movie_seat')->updateOrInsert([
                    'movie_id' => $movieId,
                    'seat_id' => $seatId
                ], [
                    'status' => 'not null'
                ]);
            }
        }

        $order = new Order();
        $order->user_id = $request->user_id;
        $order->movie_id = $request->movie_id;
        $order->date = $request->date;
        $order->save();

        $order->seats()->sync($request->seats);
    }
}
