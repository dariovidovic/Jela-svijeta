<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meal;

class MealCategoryController extends Controller
{
    public function show($slug){

        $meals = Meal::whereHas('category', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();;

        if($meals){
            return response()->json([
                'status' => 200,
                'meal' => $meals
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No meal with given id found!'
            ],404);
        }

    }
}
