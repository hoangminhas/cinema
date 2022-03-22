<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        return User::class;
    }


}
