<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    public static $withRelations = [
        'wallpaper'
    ];

    public function wallpaper() {
        return $this->hasMany(Wallpaper::class);
    }

    public static function queryEnd($category, $params = []) {//$pagIn = 50, $loc = "ru", $active = false
        if(array_key_exists('active', $params)) {
            $category->where('active', 1);
        }
        if(array_key_exists('loc', $params)) {
            $category->orderBy('title_' . $params["loc"]);
        } else {
            $category->orderBy('id', 'desc');
        }
        if(array_key_exists('pagIn', $params)) {
            return $category->paginate($params["pagIn"]);
        } else {
            return $category->get();
        }
    }

    public static function queryData($query, $request) {

        $query->title_ru = $request->title_ru;
        $query->title_en = $request->title_en;
        $query->slug = Str::of($request->title_en)->slug('_');
        $query->text_short_ru = $request->text_short_ru;
        $query->text_short_en = $request->text_short_en;
        $query->text_full_ru = $request->text_full_ru;
        $query->text_full_en = $request->text_full_en;
        $query->meta_title_ru = $request->meta_title_ru;
        $query->meta_title_en = $request->meta_title_en;
        $query->meta_description_ru = $request->meta_description_ru;
        $query->meta_description_en = $request->meta_description_en;
        $query->meta_keywords_ru = $request->meta_keywords_ru;
        $query->meta_keywords_en = $request->meta_keywords_en;
        $query->active = $request->active ? 1 : 0;

        if($request->file('img')) {
            $imgName = ImageController::resizeImagePost($request);
            $query->img = $imgName;
        }

        return $query;
    }
}
