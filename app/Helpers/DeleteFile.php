<?php

use Illuminate\Support\Facades\Storage;

function deleteFile($img) {

    $arr_path = [
        '/img/img-40x40/',
        '/img/img-80x80/',
        '/img/img-130x280/',
        '/img/img-300x300/',
        '/img/original/'
    ];

    foreach ($arr_path as $path) {
        $file = $path . $img;
        if(file_exists($file)) {
            unlink(public_path($file));
        }
    }
}
