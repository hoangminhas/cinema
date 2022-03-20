<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    public function seattype()
    {
        return $this->belongsTo(SeatType::class);
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
