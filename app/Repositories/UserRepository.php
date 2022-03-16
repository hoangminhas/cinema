<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return User::class;
    }

    public function createUser($data)
    {
        $this->model::create($data);
    }

}
