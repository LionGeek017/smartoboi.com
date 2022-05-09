<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $pathCategoryIcon = 'https://smartoboi.com/img/img-80x80/';

    public function getCategory(Request $request) {
        if(Category::all()->count() > 0) {
            $query = Category::select('id', 'title_ru', 'title_uk', 'title_en', 'slug', 'img', 'active');

            if($request->has('wallpaperTheme')) {
                $reply = $this->categoriesWallpaperTheme($request, $query);
            } else {
                $reply = $this->categoriesMainApp($request, $query);
            }

        } else {
            $reply = [
                "success" => false,
                "data" => [],
                "mess" => "Категории отсутствуют"
            ];
        }
        return response()->json($reply, 200);
    }

    public function categoriesMainApp($request, $query) {
        $query = $query
                //->where('slug', '!=', 'ukraine')
                ->where('category_id', 0);

        if(!$request->has('version_code') || $request->version_code < 4) {
            $query = $query->with(Category::$withRelations);
        }

        //$query = Category::with(Category::$withRelations);

        $params = ["active" => true];
        if($request->has('loc')) {
            $params["loc"] = $request->loc;
        }

        $query = Category::queryEnd($query, $params);

        if($request->has('version_code') && $request->version_code > 2) {
            $path = $this->pathCategoryIcon;
            $categories = collect($query)->map(function($arr) use ($path) {
                $arr->img = $arr->img ? $path.$arr->img : '';
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
        return $reply;
    }

    public function categoriesWallpaperTheme($request, $query) {
        $wallpaperTheme = mb_strtolower($request->wallpaperTheme);
        $path = $this->pathCategoryIcon;
        $category = Category::select('id')->where('slug', $wallpaperTheme)->first();
        $query = $query->where('category_id', $category->id)->active()->get();
        $categories = collect($query)->map(function($arr) use ($path) {
                $arr->img = $arr->img ? $path.$arr->img : '';
                return $arr;
            });
        return [
            "success" => true,
            "data" => $categories,
            "mess" => "Успех"
        ];
    }

}


