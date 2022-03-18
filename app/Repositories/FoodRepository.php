<?php

namespace App\Repositories;

use App\Models\Food;

class FoodRepository extends BaseRepository
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Food::class;
    }

    public function getTable()
    {
        // TODO: Implement getTable() method.
    }
}
