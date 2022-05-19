<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EventController;
use App\Models\Category;
use App\Models\Wallpaper;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class ParserController extends Controller
{
    public function index(Request $request) {

        $query = $request->has('query') ? $request['query'] : '';
        $page = $request->has('page') ? $request['page'] : 1;

        $queryUrl = (object)[
            "link" => "https://api.pexels.com/v1/search/?page=" . $page . "&per_page=80&query=",
            "query" => $query
        ];

        $categories = null;
        if(Category::all()->count() > 0) {
            $query = Category::where('active', 1)->get();
            $categories = $query;
        }

        if($request->has('query')) {

            $url = $queryUrl->link . $queryUrl->query;
            $token = '563492ad6f91700001000001e3e1d4e119674ca0b556694160272b15';

            $response = Http::withToken($token)->get($url);
            $responseJson = $response->json();

            //$perPage = $responseJson['per_page']; // на странице
            //$totalResults = $responseJson['total_results']; // всего в ответе

            return view('admin.parser.index', compact('responseJson', 'queryUrl', 'categories'));
        } else {
            return view('admin.parser.index', compact('queryUrl', 'categories'));
        }
    }

    public function getParser(Request $request) {
        $page = $request['page'];
        $query = $request['query'];
        return redirect()->route('aaadminca.parser.index', ['page' => $page, 'query' => $query]);
    }

    public function saveParser(Request $request) {
        $jsonEncode = $request->response_json;
        $categoryId = $request->category_id;
        $imageIds = $request->image_ids;
        EventController::imageParseSave($jsonEncode, $categoryId, $imageIds);

        return response()->json(['result' => 'success'], 200);

        //return redirect()->route('aaadminca.wallpapers.index', ['category_id' => $categoryId]);
    }
}
