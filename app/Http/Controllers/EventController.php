<?php

namespace App\Http\Controllers;
use App\Events\ImageParseSave;
use Illuminate\Support\Facades\Event;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public static function imageParseSave($photosJsonString, $categoryId) {
        Event::dispatch(new ImageParseSave($photosJsonString, $categoryId));
    }
}
