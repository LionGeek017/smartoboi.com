<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WallpaperRequest;
use App\Models\Category;
use App\Models\Wallpaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WallpaperController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = null;
        if(Category::all()->count() > 0) {
            $query = Category::where('active', 1)->get();
            $categories = $query;
        }

        if(Wallpaper::all()->count() > 0) {
            $query = Wallpaper::with(Wallpaper::$withRelations);
            if($request->has('category_id')) {
                $query->where('category_id', $request->category_id);
            }
            $wallpapers = Wallpaper::queryEnd($query);
            return view('admin.wallpapers.list', compact('wallpapers', 'categories'));
        } else {
            return view('admin.wallpapers.list', compact('categories'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = null;
        if(Category::all()->count() > 0) {
            $categories = Category::all();
        }
        return view('admin.wallpapers.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WallpaperRequest $request)
    {
        $query = new Wallpaper();
        $query = Wallpaper::queryData($query, $request);
        $query->save();
        return redirect()->route('aaadminca.wallpapers.index', ['category_id' => $request->category_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $wallpaper = Wallpaper::findOrFail($id);
        return view('admin.wallpapers.edit', compact('wallpaper', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WallpaperRequest $request, $id)
    {
        $query = Wallpaper::findOrFail($id);
        $query = Wallpaper::queryData($query, $request);
        $query->update();
        return redirect()->route('aaadminca.wallpapers.index', ['category_id' => $request->category_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $query = Wallpaper::findOrFail($request->id);
        deleteFile('/img/img-80x80/' . $query->img);
        deleteFile('/img/img-300x300/' . $query->img);
        deleteFile('/img/original/' . $query->img);
        $query->delete();
        return redirect()->back();
    }
}
