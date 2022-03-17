<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin as Admin;
use App\Http\Controllers\WallpaperController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/wallpaper')->name('wallpaper.')->group(function() {
    Route::get('/{category?}', [WallpaperController::class, 'index'])->name('index');
    Route::get('/{category}/{id}', [WallpaperController::class, 'view'])->name('view');
    //Route::get('/download/{id}', [WallpaperController::class, 'download'])->name('download');
});

Route::middleware('auth')->prefix('/aaadminca')->name('aaadminca.')->group(function() {
    Route::get('/', [Admin\HomeController::class, 'index'])->name('home');
    Route::resource('/categories', Admin\CategoryController::class);
    Route::resource('/wallpapers', Admin\WallpaperController::class);
    Route::get('/parser', [Admin\ParserController::class, 'index'])->name('parser.index');
    Route::post('/parser-get', [Admin\ParserController::class, 'getParser'])->name('parser.get');
    Route::post('/parser-save', [Admin\ParserController::class, 'saveParser'])->name('parser.save');
});
