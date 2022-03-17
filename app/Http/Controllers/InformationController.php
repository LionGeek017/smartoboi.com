<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index(Request $request) {
        
        $names = ['smartoboi' => 'SmartOboi'];
        
        $type = $request->type;
        $name = $names[$request->name];
        $information = Information::where('type', $type)->first();
        

        return view('site.information.index', compact('information', 'name'));
    }
}
