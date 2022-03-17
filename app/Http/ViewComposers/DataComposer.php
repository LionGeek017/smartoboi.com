<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;

use Carbon\Carbon;

class DataComposer
{
    public static function compose(View $view) {
        $date = Carbon::now();
        $dateUnix = strtotime($date);

        $view->with([
            'date' => $date,
            'dateUnix' => $dateUnix,
        ]);

        return $view;
    }

}
