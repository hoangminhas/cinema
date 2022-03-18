<?php

namespace App\Services;

use App\Repositories\FoodRepository;

class FoodService
{
    public $foodRepository;
    public function __construct(FoodRepository $foodRepository)
    {
        $this->foodRepository = $foodRepository;
    }

    public function getAllFood()
    {
        return $this->foodRepository->getAllByEloquent();
    }

}
