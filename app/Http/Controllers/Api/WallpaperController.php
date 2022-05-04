<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wallpaper;
use App\Models\Category;
use Illuminate\Http\Request;

class WallpaperController extends Controller
{
    public function getWallpaper(Request $request) {
        if(Wallpaper::all()->count() > 0) {

            $query = Wallpaper::select('id', 'category_id', 'title_ru', 'title_uk', 'title_en', 'img');

            if($request->has('wallpaperTheme')) {
                $reply = $this->wallpapersWallpaperTheme($request, $query);
            } else {
                $reply = $this->wallpapersMainApp($request, $query);
            }
        } else {
            $reply = [
                "success" => false,
                "data" => [],
                "mess" => "Обои еще не добавлены"
            ];
        }
        return response()->json($reply, 200);
    }

    public function wallpapersMainApp($request, $query) {
        if(!$request->has('version_code') || $request->version_code < 4) {
            $query = $query->with(Wallpaper::$withRelations);
        }

        if($request->has('category_id')) {
            if($request->has('wallpaper_ids')) {
                $ids = explode(',', $request->wallpaper_ids);
                $query = $query->whereIn('id', $ids);
            } else {
                $category_ids = Category::where('category_id', $request->category_id)
                    ->pluck('id')
                    ->toArray();
                $category_ids[] = $request->category_id;
                $query = $query->whereIn('category_id', $category_ids);
            }
        } else {
            $main_category_ids = Category::where('category_id', 0)
                ->where('slug', '!=', 'ukraine')
                ->pluck('id')
                ->toArray();

            $category_ids = Category::whereIn('category_id', $main_category_ids)
                ->pluck('id')
                ->toArray();

            $query = $query->whereIn('category_id', $category_ids);
        }
        $query = Wallpaper::queryEnd($query, false, 60);

        if(!$request->has('version_code') || $request->version_code <= 2) {
            $wallpapers = $query;
        } else {
            $path = 'https://smartoboi.com/img/img-300x300/';
            $pathOriginal = 'https://smartoboi.com/img/original/';

            $collect = $query->getCollection();
            $collect_ = collect($collect)->map(function($arr) use ($request, $path, $pathOriginal) {
                $img = $arr->img;

                if($request->has('version_code') && $request->version_code >= 4) {
                    if(file_exists(public_path() . '/img/img-130x280/' . $img)) {
                        $path = 'https://smartoboi.com/img/img-130x280/';
                    }
                }

                $arr->img = $path.$img;
                $arr->img_original = $pathOriginal.$img;
                return $arr;
            });
            $wallpapers = $query->setCollection($collect_);
        }

        return [
            "success" => true,
            "data" => $wallpapers,
            "mess" => "Успех"
        ];
    }

    public function wallpapersWallpaperTheme($request, $query) {
        $wallpaperTheme = mb_strtolower($request->wallpaperTheme);

        if($request->has('category_id')) {
            if($request->has('wallpaper_ids')) {
                $ids = explode(',', $request->wallpaper_ids);
                $query = $query->whereIn('id', $ids);
            } else {
                $query = $query->where('category_id', $request->category_id);
            }
        } else {
            $category = Category::select('id')->where('slug', $wallpaperTheme)->first();
            $category_ids = Category::where('category_id', $category->id)
                ->pluck('id')
                ->toArray();
            $query = $query->whereIn('category_id', $category_ids);
        }
        $query = Wallpaper::queryEnd($query, false, 60);

        $path = 'https://smartoboi.com/img/img-300x300/';
        $pathOriginal = 'https://smartoboi.com/img/original/';

        $collect = $query->getCollection();
        $collect_ = collect($collect)->map(function($arr) use ($request, $path, $pathOriginal) {
            $img = $arr->img;

            if(file_exists(public_path() . '/img/img-130x280/' . $img)) {
                $path = 'https://smartoboi.com/img/img-130x280/';
            }

            $arr->img = $path.$img;
            $arr->img_original = $pathOriginal.$img;
            return $arr;
        });
        $wallpapers = $query->setCollection($collect_);

        return [
            "success" => true,
            "data" => $wallpapers,
            "mess" => "Успех"
        ];
    }

}
