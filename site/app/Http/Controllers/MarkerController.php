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
    	$marker = Marker::findOrFail($id);

        return view('marker.show', compact('marker'));
    }










    public function edit(Request $request, $id)
    {
    	$marker = Marker::findOrFail($id);

        return view('marker.edit', compact('marker'));
    }


    public function update(MarkerRequest $request)
    {
        return view('marker.index');
    }




    public function destroy(Request $request, $id)
    {
        return view('/');
    }

}
