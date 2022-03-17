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
        $path40x40 = public_path('/img/img-40x40');
        $path80x80 = public_path('/img/img-80x80');
        $path130x280 = public_path('/img/img-130x280');
        $path300x300 = public_path('/img/img-300x300');

        if($imgJson) {
            $imgUrl = $imgJson->src->portrait;
            $imgUrlExplode = explode('?', $imgUrl);
            $imgUrlGet = $imgUrlExplode[0];
            $imgUrlGetExplode = explode('.', $imgUrlGet);
            $imgType = end($imgUrlGetExplode);
            $imgId = $imgJson->id;
            $input['imagename'] = 'img_' . $imgId . '_' . time() . '.' . $imgType;
            //$img = Image::make($imgUrl);
        } else {
            $image = $request->file('img');
            $imgType = $image->extension();
            $input['imagename'] = 'img_' . time() . '.' . $imgType;
            //$img = Image::make($image->path());
        }
        
        if($imgType != 'png' && $imgType != 'jpeg' && $imgType != 'jpg' && $imgType != 'JPG' && $imgType != 'JPEG') {
            dd('Изображение должно быть ".jpg" или ".png"');
        }
        
        if($imgJson) {
            $imgUrl = $imgJson->src->portrait;
            Image::make($imgUrl)->save($originalPath . '/' . $input['imagename']);
        } else {
            $image->move($originalPath, $input['imagename']);
        }
        
        $imageNewParams = [
                ['path' => $path40x40, 'width' => 40, 'height' => 40],
                ['path' => $path80x80, 'width' => 80, 'height' => 80],
                ['path' => $path130x280, 'width' => 130, 'height' => 280],
                ['path' => $path300x300, 'width' => 300, 'height' => 300]
            ];
        
        //foreach($imageNewParams as $imageNewParam) {
            //$this->imageResizeCrop($originalPath, $path300x300, $input['imagename'], 300, 300);
        //}
        $count = count($imageNewParams);
        $imageName = $input['imagename'];
        for($i = 0; $i < $count; $i++) {
            
            $widthNew = $imageNewParams[$i]['width'];
            $heightNew = $imageNewParams[$i]['height'];
            $newPath = $imageNewParams[$i]['path'];
            
            $imageOriginal = $originalPath . '/' . $imageName;
            $imageSize = getimagesize($imageOriginal);
            $imageX = $imageSize[0];
            $imageY = $imageSize[1];
            
            if($imageX > $imageY) {
                $width = $imageX * $heightNew / $imageY;
                $height = $heightNew;
            } else if($imageX < $imageY) {
                $width = $widthNew;
                $height = $imageY * $widthNew / $imageX;
            } else {
                $width = $widthNew;
                $height = $heightNew;
            }
            
            $image_p = imagecreatetruecolor($width, $height);
            
            if($imgType == 'png') {
                $image = @imagecreatefrompng($imageOriginal);
            } else {
                $image = @imagecreatefromjpeg($imageOriginal);    
            }
            
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $imageX, $imageY);
            
            $x = $width / 2 - $widthNew / 2;
            $y = $height / 2 - $heightNew / 2;
            
            $img_ = imagecrop($image_p, ['x' => $x, 'y' => $y, 'width' => $widthNew, 'height' => $heightNew]);
            
            if($imgType == 'png') {
                imagepng($img_, $newPath . '/' . $imageName);
            } else {
                imagejpeg($img_, $newPath . '/' . $imageName);
            }
            
            imagedestroy($img_);
        }
        
        
        
        /*

        //$img = Image::make($image->path());
        $img->resize(300, 300, function($constraint) {
            $constraint->aspectRatio();
        })->save($img300x300Path . '/' . $input['imagename']);
        
        //$img = Image::make($image->path());
        //$img = Image::make($image->path());
        //$img->resize(130, 280, function($constraint) {
        //    $constraint->aspectRatio();
        //})->save($img130x280Path . '/' . $input['imagename']);
        

        $img = Image::make($image->path());
        $img->resize(80, 80, function($constraint) {
            $constraint->aspectRatio();
        })->save($img80x80Path . '/' . $input['imagename']);
        
        $img->resize(40, 40, function($constraint) {
            $constraint->aspectRatio();
        })->save($img40x40Path . '/' . $input['imagename']);

        
        
        $img = imagecreatefromjpeg($originalPath . '/' . $input['imagename']);
        $x = imagesx($img) / 2 - 65;
        $y = imagesy($img) / 2 - 140;
        $img_ = imagecrop($img, ['x' => $x, 'y' => $y, 'width' => 130, 'height' => 280]);
        imagejpeg($img_, $img130x280Path . '/' . $input['imagename']);
        imagedestroy($img_);
        
        */

        return $input['imagename'];
    }
    
    /*
    public function imageResizeCrop($originalPath, $newPath, $imageName, $widthNew, $heightNew) {
        
        dump($originalPath);
        dump($newPath);
        dump($imageName);
        dump($widthNew);
        dd($heightNew);
        
        $imageOriginal = $originalPath . '/' . $imageName;
        $imageSize = getimagesize($imageOriginal);
        $imageX = $imageSize[0];
        $imageY = $imageSize[1];
        
        if($imageX > $imageY) {
            $width = $imageX * $heightNew / $imageY;
            $height = $heightNew;
        } else if($imageX < $imageY) {
            $width = $widthNew;
            $height = $imageY * $widthNew / $imageX;
        } else {
            $width = $widthNew;
            $height = $heightNew;
        }
        
        $image_p = imagecreatetruecolor($width, $height);
        $image = imagecreatefromjpeg($imageOriginal);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $imageX, $imageY);
        
        $x = $width / 2 - $widthNew / 2;
        $y = $height / 2 - $heightNew / 2;
        
        $img_ = imagecrop($image_p, ['x' => $x, 'y' => $y, 'width' => $widthNew, 'height' => $heightNew]);
        imagejpeg($img_, $newPath . '/' . $imageName);
        imagedestroy($img_);
    }
    */

}
