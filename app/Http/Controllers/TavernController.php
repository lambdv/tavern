<?php

namespace App\Http\Controllers;

use App\Models\Tavern;
use Illuminate\Http\Request;

class TavernController extends Controller
{
    public function taverns(){
        $taverns = Tavern::orderBy('created-at', 'desc')->paginate(10);
        return view('home.taverns', ["taverns" => $taverns]);
    }

    
}
