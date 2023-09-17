<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Log;

class MealController extends Controller
{
    public function index(){
        
        $meals = Meal::all();

        if($meals->count()>0){
            return response()->json([
                'status' => 200,
                'meals' => $meals
            ],200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'No meals found!'
            ],404);
        }
    }

    public function show($id){

        $meal = Meal::find($id);

        if($meal){
            return response()->json([
                'status' => 200,
                'meal' => $meal
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No meal with given id found!'
            ],404);
        }

    }


    public function search(Request $request){

        $title = $request->input('title');
        $per_page = $request->input('per_page');
        $languageCode = $request->input('lang');
        $with = $request->input('with');

        $query = Meal::query();

        if ($with && in_array('ingredients', explode(',', $with))) {
            $query->with('ingredients');
        }

        if ($with && in_array('category', explode(',', $with))) {
            $query->with('category');
        }

        if ($with && in_array('tag', explode(',', $with))) {
            $query->with('tag');
        }

        if($title){
            $query->where('title', 'LIKE', "%$title%");
        }

        if($per_page){
            $meals = $query->paginate($per_page);
        }
        else{
            $meals = $query->get();
        }


        if ($languageCode) {
            $meals->load('translations');
          
            
            $meals->each(function ($meal) use ($languageCode) {
                $translation = $meal->translations->where('locale', $languageCode)->first();
            
                if ($translation) {
                    $meal->title = $translation->title;
                    $meal->description = $translation->description;
                }

                unset($meal->translations);
            });

            $meals->load('category.translations');
    
            $meals->each(function ($meal) use ($languageCode) {
                $categoryTranslation = $meal->category->translations->where('locale', $languageCode)->first();
                
                if ($categoryTranslation) {
                    $meal->category->title = $categoryTranslation->title;
                    $meal->category->slug = $categoryTranslation->slug;
                }
                
                unset($meal->category->translations);
            });

            $meals->load('tag.translations');
    
            $meals->each(function ($meal) use ($languageCode) {
                $tagTranslation = $meal->tag->translations->where('locale', $languageCode)->first();
                
                if ($tagTranslation) {
                    $meal->tag->title = $tagTranslation->title;
                    $meal->tag->slug = $tagTranslation->slug;
                }
                
                unset($meal->tag->translations);
            });

            $meals->load('ingredients.translations');

            $meals->each(function ($meal) use ($languageCode) {
                foreach ($meal->ingredients as $ingredient) {
                    $ingredientTranslation = $ingredient->translations->where('locale', $languageCode)->first();
        
                    if ($ingredientTranslation) {
                        $ingredient->ingredient = $ingredientTranslation->ingredient;
                        $ingredient->slug = $ingredientTranslation->slug;
                    }
        
                    unset($ingredient->translations);
                }
            });
        

        }
        
        
        if($meals->count()>0){
            return response()->json([
                'status' => 200,
                'meals' => $meals
            ],200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'No meals found!'
            ],404);
        }
      

    }

}
