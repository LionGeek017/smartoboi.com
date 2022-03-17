<?php

namespace App\Http\Controllers;

use App\Models\MetaTag;
use App\Models\Wallpaper;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $meta = (object)[];

        if(MetaTag::all()->count() > 0) {
            $metaSel = MetaTag::findOrFail(1);
            $meta->meta_title = $metaSel->title;
            $meta->meta_description = $metaSel->description;
            $meta->meta_keywords = $metaSel->keywords;
            $meta->meta_img = $metaSel->img;
            $meta->seo_main = $metaSel->seo_main;
        }

        $wallpapers = [];
        if(Wallpaper::all()->count() > 0) {
            $wallpapers = Wallpaper::with(Wallpaper::$withRelations)
                //->orderByDesc('id')
                ->inRandomOrder()
                ->limit(12)
                ->get();
        }

        return view('site.home', compact('wallpapers', 'meta'));
    }
}
