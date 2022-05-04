<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ImageController;
use App\Models\WallpaperCategory;

class Wallpaper extends Model
{
    use HasFactory;

    public static $withRelations = [
        'category'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public static function queryEnd($wallpaper, $random = false, $pagIn = 50) {
        if($random) {
            return $wallpaper->inRandomOrder()->paginate($pagIn);
        } else {
            return $wallpaper->orderBy('id', 'desc')->paginate($pagIn);
        }
    }

    public static function queryData($query, $request) {

        $query->title_ru = $request->title_ru;
        $query->title_en = $request->title_en;
        $query->category_id = $request->category_id;
        if($request->file('img')) {
            $imgName = ImageController::resizeImagePost($request);
            $query->img = $imgName;
        }
        return $query;
    }
}
