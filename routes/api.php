<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MealController;
use App\Http\Controllers\Api\MealCategoryController;
use App\Http\Controllers\Api\LanguageController;
use App\Http\Controllers\Api\MealTagController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/meals/search', [MealController::class, 'search']);

Route::get('meals',[MealController::class, 'index']);

Route::get('/meals/{id}', [MealController::class, 'show'])->where('id', '[0-9]+');

Route::get('languages', [LanguageController::class, 'index']);

Route::get('/meals/category/{slug}', [MealCategoryController::class, 'show']);

Route::get('/meals/tag/{slug}', [MealTagController::class, 'show']);
