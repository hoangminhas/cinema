<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function seats()
    {
        return $this->belongsToMany(Seat::class);
    }

    protected $fillable = [
        'user_id',
        'movie_id',
        'date',
        'seats'
    ];
}
