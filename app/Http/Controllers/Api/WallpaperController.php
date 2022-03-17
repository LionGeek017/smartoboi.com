<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wallpaper;
use Illuminate\Http\Request;

class WallpaperController extends Controller
{
    public function getWallpaper(Request $request) {
        if(Wallpaper::all()->count() > 0) {
            $query = Wallpaper::with(Wallpaper::$withRelations);
            if($request->has('category_id')) {
                $query->where('category_id', $request->category_id);
            }

            $query = Wallpaper::queryEnd($query, false, 100);

            if($request->has('version_code') && $request->version_code > 2) {
                $path = 'https://smartoboi.com/img/img-300x300/';
                $pathOriginal = 'https://smartoboi.com/img/original/';

                $collect = $query->getCollection();
                $collect_ = collect($collect)->map(function($arr) use ($path, $pathOriginal) {
                    $img = $arr->img;
                    $arr->img = $path.$img;
                    $arr->img_original = $pathOriginal.$img;
                    return $arr;
                });
                $wallpapers = $query->setCollection($collect_);
            } else {
                $wallpapers = $query;
            }

            $reply = [
                "success" => true,
                "data" => $wallpapers,
                "mess" => "Успех"
            ];
        } else {
            $reply = [
                "success" => false,
                "data" => [],
                "mess" => "Обои еще не добавлены"
            ];
        }
        return response()->json($reply, 200);
    }

}
