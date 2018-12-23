<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MarkerRequest;
use App\Marker;
use Auth;

class MarkerController extends Controller
{
    public function index()
    {
    	$markers = Auth::user()->markers;

    	return view('marker.index', compact('markers'));
    }


    public function create()
    {
    	if (!Auth::user()->can('create', Marker::class)) {
            return abort(403);
        }

        return view('marker.create');
    }


    public function store(MarkerRequest $request)
    {
    	if (!Auth::user()->can('store', Marker::class)) {
            return abort(403);
        }

    	$marker = new Marker;
    	$marker->user_id = Auth::id();
    	$marker->latitude = $request->latitude;
    	$marker->longitude = $request->longitude;
    	$marker->name = $request->name;
    	$marker->address = $request->address;
    	$marker->save();

    	$request->session()->flash('success', 'Successfully created!');

    	return redirect()->route('marker.index');
    }


    public function show(Request $request, $id)
    {
    	$marker = Marker::findOrFail($id);

    	if (!Auth::user()->can('view', $marker)) {
            return abort(403);
        }

        return view('marker.show', compact('marker'));
    }


    public function edit(Request $request, $id)
    {
    	$marker = Marker::findOrFail($id);

    	if (!Auth::user()->can('edit', $marker)) {
            abort(403);
        }

        return view('marker.edit', compact('marker'));
    }


    public function update(MarkerRequest $request, $id)
    {
    	$marker = Marker::findOrFail($id);

    	if (!Auth::user()->can('update', $marker)) {
            abort(403);
        }

    	$marker->latitude = $request->latitude;
    	$marker->longitude = $request->longitude;
    	$marker->name = $request->name;
    	$marker->address = $request->address;
    	$marker->save();

        $request->session()->flash('success', 'Successfully updated!');

        return redirect()->route('marker.index');
    }


    public function destroy(Request $request, $id)
    {
    	$marker = Marker::findOrFail($id);

    	if (!Auth::user()->can('destroy', $marker)) {
            abort(403);
        }

    	$marker->delete();

    	$request->session()->flash('success', 'Successfully deleted!');

    	return redirect()->route('marker.index');
    }

}
