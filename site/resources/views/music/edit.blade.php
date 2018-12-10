@extends('layouts.main')

@section('title', 'Edit music')

@section('content')
    <h1>Edit music</h1>
    <form method="POST" action="{{ route('music.update', ['id' => $musicSet->id]) }}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <label for="music-set-name">Name</label>
        <input type="text" name="music_set_name" id="music-set-name" value="{{ old('music_set_name') ?? $musicSet->name }}">
        <input type="file" name="music_file">
        <input type="submit" value="Edit">
    </form>
@endsection
