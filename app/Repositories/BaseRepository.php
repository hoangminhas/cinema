<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\Impl\BaseInterface;

abstract class BaseRepository implements BaseInterface
{
     public $model;
    public $table;
    public function __construct()
    {
        $this->model = $this->getModel();
        $this->table = $this->getTable();
    }

     public abstract function getModel();
    public abstract function getTable();


    public function getAll()
    {
        return DB::table($this->table)->orderByDesc('id')->get();
    }


    public function getById($id)
    {
        return DB::table($this->table)->where('id',$id)->first();
    }

    public function deleteById($id)
    {
        return DB::table($this->table)->where('id',$id)->delete();
    }

    public function getAllByEloquent()
    {
        return $this->model::all()->sortByDesc('id')->values();
    }
}
