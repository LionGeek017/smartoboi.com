<?php

use Illuminate\Support\Facades\Storage;

function deleteFile($pathName) {
    unlink(public_path($pathName));
}
