<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api as Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::middleware()

Route::prefix('v1')->group(function() {
    Route::get('database.getCategories', [Api\CategoryController::class, 'getCategory']);
    Route::get('database.getWallpapers', [Api\WallpaperController::class, 'getWallpaper']);
    Route::get('database.getImagePars', [Api\ImageParsController::class, 'getImagePars']);
    Route::get('database.getAdModal', [Api\AdModalController::class, 'getAdModal']);

    Route::get('database.getQuestions', [Api\QuestionController::class, 'getQuestion']);

    //Route::get('database.getImagePars', [Api\ImageParsController::class, 'getImagePars']);

    Route::get('database.getProducer', [Api\ProducerController::class, 'getProducer']);
});
