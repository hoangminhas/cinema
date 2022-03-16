<?php

namespace App\Repositories;

use App\Repositories\Impl\BaseInterface;

abstract class BaseRepository implements BaseInterface
{
    public $model;
    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public abstract function getModel();

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->model::all();
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        return $this->model::first($id);
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
        return $this->model::destroy($id);
    }

}
