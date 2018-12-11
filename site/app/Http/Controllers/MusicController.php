<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MusicSetRequest;
use App\MusicSet;
use App\MusicFile;
use Auth;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $musicSets = Auth::user()->musicSets;

        return view('music.index', compact('musicSets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('create', MusicSet::class)) {
            return abort(403);
        }

        return view('music.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\MusicSetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MusicSetRequest $request)
    {
        if (!Auth::user()->can('store', MusicSet::class)) {
            return abort(403);
        }

        if ($request->file('music_file')->isValid()) {
            $musicFilePath = $request->file('music_file')->store('music_files');
        }
        else {
            return redirect()->back();
        }

        $musicSet = new MusicSet;
        $musicSet->user_id = Auth::id();
        $musicSet->name = $request->music_set_name;
        $musicSet->save();

        $musicFile = new MusicFile;
        $musicFile->music_set_id = $musicSet->id;
        $musicFile->path = $musicFilePath;
        $musicFile->save();

        $request->session()->flash('success', 'Successfully created!');

        return redirect()->route('music.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $musicSet = MusicSet::findOrFail($id);

        if (!Auth::user()->can('view', $musicSet)) {
            return abort(403);
        }

        $musicFiles = $musicSet->musicFiles;

        return view('music.show', compact('musicSet', 'musicFiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $musicSet = MusicSet::findOrFail($id);

        if (!Auth::user()->can('edit', $musicSet)) {
            abort(403);
        }

        return view('music.edit', compact('musicSet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\MusicSetRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MusicSetRequest $request, $id)
    {
        $musicSet = MusicSet::findOrFail($id);

        if (!Auth::user()->can('update', $musicSet)) {
            abort(403);
        }

        if ($request->file('music_file')->isValid()) {
            $musicFilePath = $request->file('music_file')->store('music_files');
        }
        else {
            return redirect()->back();
        }

        $musicSet->name = $request->music_set_name;
        $musicSet->save();

        $musicFile = MusicFile::where('music_set_id', $musicSet->id)->first(); // ->first() is temp
        $musicFile->path = $musicFilePath;
        $musicFile->save();

        $request->session()->flash('success', 'Successfully updated!');

        return redirect()->route('music.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $musicSet = MusicSet::findOrFail($id);

        if (!Auth::user()->can('destroy', $musicSet)) {
            abort(403);
        }

        $musicSet->delete();
        $request->session()->flash('success', 'Successfully deleted!');

        return redirect()->route('music.index');
    }
}
