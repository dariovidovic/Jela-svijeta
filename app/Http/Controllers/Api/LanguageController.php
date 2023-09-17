<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index(){

        $languages = Language::all();

        if($languages->count()>0){

            return response()->json([
                'status' => 200,
                'languages' => $languages
            ], 200);

        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No languages found!'
            ], 404);
        }

    }
}
