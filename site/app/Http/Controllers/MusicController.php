<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function index()
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'music_set_name' => 'required|string|unique:music_sets,name|max:255',
            'music_file' => 'required|mimetypes:audio/wav,audio/mpeg,audio/mp3|max:10000', // Max 10 MB
        ]);

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

        $request->session()->flash('success', 'Success!');

        return redirect()->route('music.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
