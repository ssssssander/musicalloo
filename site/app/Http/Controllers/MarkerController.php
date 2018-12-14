<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MarkerRequest;
use App\Marker;


class MarkerController extends Controller
{
    public function index()
    {
    	$markers = Marker::all();

    	return view('marker.index', compact('markers'));
    }


    public function create()
    {
        return view('marker.create');
    }


    public function store(MarkerRequest $request)
    {
    	$marker = new Marker;
    	$marker->latitude = $request->latitude;
    	$marker->longitude = $request->longitude;
    	$marker->name = $request->name;
    	$marker->address = $request->address;
    	$marker->save();

    	return view('marker.index');
    }


    public function show(Request $request, $id)
    {
        return view('/');
    }










    public function edit(Request $request, $id)
    {
        return view('');
    }


    public function update()
    {
        return view('');
    }


    public function destroy(Request $request, $id)
    {
        return view('');
    }

}
