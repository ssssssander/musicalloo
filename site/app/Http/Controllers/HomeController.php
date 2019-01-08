<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marker;

class HomeController extends Controller
{
    public function home()
    {
        $markers = Marker::all();

        return view('home', compact('markers'));
    }
}
