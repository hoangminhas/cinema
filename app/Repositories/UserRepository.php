<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function getTable()
    {
        return 'users';
    }


    public function createUser($data)
    {
        $this->model::create($data);
    }


    public function getModel()
    {
        // TODO: Implement getModel() method.
    }
}
