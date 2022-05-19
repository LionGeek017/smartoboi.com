<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Wallpaper;
use App\Http\Controllers\ImageController;

class ImageParseSaveFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $jsonEncode = $event->photosJsonString;
        $jsonDecode = json_decode($jsonEncode);
        $photosJson = $jsonDecode->photos;
        $categoryId = $event->categoryId;
        $imageIds = $event->imageIds;

        $count = 0;
        foreach($photosJson as $photo) {
            //if($count == 5) break;

            if(in_array($photo->id, $imageIds)) {
                $imgName = ImageController::resizeImagePost(request(), $photo);
                $query = new Wallpaper();
                $query->category_id = $categoryId;
                $query->img = $imgName;
                $query->save();

                $key = array_search($photo->id, $imageIds);
                unset($imageIds[$key]);
            }

            //$count++;
        }
    }
}
