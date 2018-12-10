@extends('layouts.main')

@section('title', 'Add music')

@section('content')
    <h1>Add music</h1>
    <form method="POST" action="{{ route('music.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        <label for="music-set-name">Name</label>
        <input type="text" name="music_set_name" id="music-set-name" value="{{ old('music_set_name') }}">
        <input type="file" name="music_file">
        <input type="submit" value="Create">
    </form>
@endsection
