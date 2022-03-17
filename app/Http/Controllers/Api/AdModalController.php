<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AdModal;
use Illuminate\Http\Request;

class AdModalController extends Controller
{
    public function getAdModal() {

        if(AdModal::all()->count() > 0) {
            //$adModal = AdModal::findOrFail(1);

            $adModal = AdModal::where('act', 1)
                ->inRandomOrder()
                ->limit(1)
                ->first();

            $reply = [
                "success" => true,
                "data" => $adModal,
                "mess" => "Реклама в модальном окне"
            ];
        } else {
            $reply = [
                "success" => false,
                "data" => null,
                "mess" => "Ничего нету"
            ];
        }

        return response()->json($reply, 200);

    }
}
