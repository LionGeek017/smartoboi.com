<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategory(Request $request) {
        if(Category::all()->count() > 0) {
            $query = Category::with(Category::$withRelations);

            $params = ["active" => true];
            if($request->has('loc')) {
                $params["loc"] = $request->loc;
            }

            $query = Category::queryEnd($query, $params);

            if($request->has('version_code') && $request->version_code > 2) {
                $path = 'https://smartoboi.com/img/img-80x80/';

                $categories = collect($query)->map(function($arr) use ($path) {
                    $arr->img = $path.$arr->img;
                    return $arr;
                });
            } else {
                $categories = $query;
            }

            $reply = [
                "success" => true,
                "data" => $categories,
                "mess" => "Успех"
            ];
        } else {
            $reply = [
                "success" => false,
                "data" => [],
                "mess" => "Категории отсутствуют"
            ];
        }
        return response()->json($reply, 200);
    }

}


