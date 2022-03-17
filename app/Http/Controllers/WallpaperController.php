<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Wallpaper;
use Illuminate\Http\Request;

class WallpaperController extends Controller
{
    public function index(Request $request) {

        $meta = (object)[
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'seo_category' => ''
        ];

        $categories = [];
        if(Category::all()->count() > 0) {
            $categories = Category::select('id', 'title_ru', 'slug', 'img')
                ->where('active', 1)
                ->get();
        }

        if($request->category != null) {
            $category = Category::where('slug', $request->category)->first();
            $meta->meta_title = $category->meta_title_ru;
            $meta->meta_description = $category->meta_description_ru;
            $meta->meta_keywords = $category->meta_keywords_ru;
            $meta->seo_category = $category->text_full_ru;
        }

        $wallpapers = [];
        if(Wallpaper::all()->count() > 0) {
            $wallpapers = Wallpaper::with(Wallpaper::$withRelations);

            if($request->category != null) {
                $wallpapers->where('category_id', $category->id);
            }

            $wallpapers = Wallpaper::queryEnd($wallpapers, false, 60);
        }

        return view('site.wallpaper.index', compact('categories', 'wallpapers', 'meta'));
    }

    public function view($category, $id) {

        $meta = (object)[
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => ''
        ];

        $wallpaper = Wallpaper::with(Wallpaper::$withRelations)->findOrFail($id);
        return view('site.wallpaper.view', compact('wallpaper', 'meta'));
    }

    public function download($id) {

    }
}
