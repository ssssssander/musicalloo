<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMusicSet;
use App\Http\Requests\UpdateMusicSet;
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
     * @param  \Illuminate\Http\Requests\StoreMusicSet  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMusicSet $request)
    {
        if (!Auth::user()->can('store', MusicSet::class)) {
            return abort(403);
        }

        $musicSet = new MusicSet;
        $musicSet->user_id = Auth::id();
        $musicSet->name = $request->musicset_name;
        $musicSet->save();

        foreach ($request->file('music_file.*') as $file) {
            if ($file->isValid()) {
                $musicFilePath = $file->store('music_files');

                $musicFile = new MusicFile;
                $musicFile->music_set_id = $musicSet->id;
                $musicFile->path = $musicFilePath;
                $musicFile->save();
            }
            else {
                return redirect()->back();
            }
        }

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
     * @param  \Illuminate\Http\Requests\UpdateMusicSet  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMusicSet $request, $id)
    {
        $musicSet = MusicSet::findOrFail($id);

        if (!Auth::user()->can('update', $musicSet)) {
            abort(403);
        }

        $musicSet->name = $request->musicset_name;
        $musicSet->save();

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
