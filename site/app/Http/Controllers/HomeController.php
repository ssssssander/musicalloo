<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function map()
    {
        return view('map');
    }


    public function faq()
    {
        return view('faq');
    }


    public function contact()
    {
        return view('contact');
    }


    public function music()
    {
        return view('music');
    }
}
