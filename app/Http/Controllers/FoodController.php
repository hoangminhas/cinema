<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Repositories\FoodRepository;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public $foodRepository;

    public function __construct(FoodRepository $foodRepository)
    {
        $this->foodRepository = $foodRepository;
    }

    public function index()
    {
        $foods = $this->foodRepository->getAll();
        return view('backend.food.index',compact('foods'));
    }

    public function create()
    {
        return view('backend.food.create');
    }


    public function store(Request $request)
    {
        $this->foodRepository->store($request);
        toastr()->success("Create Success");
        return redirect()->route('food.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $food = $this->foodRepository->getById($id);
        return view('backend.food.update',compact('food'));
    }


    public function update(Request $request, $id)
    {
        $this->foodRepository->update($request,$id);
        toastr()->success("Update Success");
        return redirect()->route('food.index');
    }

    public function destroy($id)
    {
        $this->foodRepository->deleteById($id);
        toastr()->error("Delete Success");
        return redirect()->route('food.index');
    }
}
