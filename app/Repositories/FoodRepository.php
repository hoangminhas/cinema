<?php

namespace App\Repositories;

use App\Models\Food;
use Illuminate\Support\Facades\DB;

class FoodRepository extends BaseRepository
{


    public function getTable()
    {
        return 'food';
    }
    public function getModel()
    {
        return Food::class;
    }

    public function store($request)
    {
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs("images", $fileName, "public");
        } else {
            $path = "images/default.jpg";
        }
        $food = new Food();
        $food->name = $request->name;
        $food->price = $request->price;
        $food->image = $path;
        $food->save();
    }

    public function update($request, $id)
    {
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs("images", $fileName, "public");
        }

        $food = Food::findOrFail($id);
        $food->name = $request->name;
        $food->price = $request->price;
        $food->image = $path ?? $food->image;
        $food->save();
    }

    public function deleteById($id)
    {
        DB::table('orders')->where('food_id',$id)->delete();
        DB::table($this->table)->where('id',$id)->delete();
    }
}
