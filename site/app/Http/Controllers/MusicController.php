<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMusicSet;
use App\MusicSet;
use App\MusicFile;
use Auth;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
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
        return view('music.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMusicSet $request)
    {
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $musicSet = MusicSet::findOrFail($id);
        $musicFiles = $musicSet->musicFiles;

        return view('music.show', compact('musicSet', 'musicFiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $musicSet = MusicSet::findOrFail($id);

        return view('music.edit', compact('musicSet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMusicSet $request, $id)
    {
        if ($request->file('music_file')->isValid()) {
            $musicFilePath = $request->file('music_file')->store('music_files');
        }
        else {
            return redirect()->back();
        }

        $musicSet = MusicSet::find($id);
        $musicSet->name = $request->music_set_name;
        $musicSet->save();

        $musicFile = MusicFile::where('music_set_id', $musicSet->id)->first();
        $musicFile->path = $musicFilePath;
        $musicFile->save();

        $request->session()->flash('success', 'Successfully updated!');

        return redirect()->route('music.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $musicSet = MusicSet::find($id);
        $musicSet->delete();

        $request->session()->flash('success', 'Successfully deleted!');

        return redirect()->route('music.index');
    }
}
