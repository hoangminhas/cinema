<?php

namespace App\Repositories;

class CategoryRepository extends BaseRepository
{
    public function getTable()
    {
        return 'categories';
    }
}
