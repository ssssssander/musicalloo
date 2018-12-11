@extends('layouts.main')

@section('title', 'Add music')

@section('content')
    <h1>Add music</h1>
    <form method="POST" action="{{ route('music.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        <label for="music-set-name">Name</label>
        <input type="text" name="music_set_name" id="music-set-name" value="{{ old('music_set_name') }}">
        <label for="music_file[0]">Music file 1</label>
        <input type="file" name="music_file[0]" id="music_file[0]">
        <input type="submit" value="Submit">
    </form>
    <button id="add-file-button">+</button>
@endsection
