<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marker;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }


    public function map()
    {
        $markers = Marker::all();

        return view('map', compact('markers'));
    }


    public function faq()
    {
        return view('faq');
    }


    public function contact()
    {
        return view('contact');
    }
}
