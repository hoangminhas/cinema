<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(Category::class);

    }

    public function seats()
    {
        return $this->belongsToMany(Seat::class)->withPivot('status');
    }
}
