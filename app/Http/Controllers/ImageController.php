<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ImageController extends Controller
{
    public static function resizeImagePost(Request $request, $imgJson = false) {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        // ]);

        $originalPath = public_path('/img/original');
        $img80x80Path = public_path('/img/img-80x80');
        $img300x300Path = public_path('/img/img-300x300');

        if($imgJson) {
            $imgUrl = $imgJson->src->portrait;
            $imgUrlExplode = explode('?', $imgUrl);
            $imgUrlGet = $imgUrlExplode[0];
            $imgUrlGetExplode = explode('.', $imgUrlGet);
            $imgType = end($imgUrlGetExplode);


            $imgId = $imgJson->id;

            $input['imagename'] = 'img_' . $imgId . '_' . time() . '.' . $imgType;
            $img = Image::make($imgUrl);
        } else {
            $image = $request->file('img');
            $input['imagename'] = 'img_' . time() . '.' . $image->extension();
            $img = Image::make($image->path());
        }

        //$img = Image::make($image->path());
        $img->resize(300, 300, function($constraint) {
            $constraint->aspectRatio();
        })->save($img300x300Path . '/' . $input['imagename']);

        //$img = Image::make($image->path());
        $img->resize(80, 80, function($constraint) {
            $constraint->aspectRatio();
        })->save($img80x80Path . '/' . $input['imagename']);

        if($imgJson) {
            $imgUrl = $imgJson->src->portrait;
            Image::make($imgUrl)->save($originalPath . '/' . $input['imagename']);
        } else {
            $image->move($originalPath, $input['imagename']);
        }

        return $input['imagename'];
    }

}
