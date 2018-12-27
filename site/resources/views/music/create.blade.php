@extends('layouts.main')

@section('title', 'Add music')

@section('content')
    <h1>Add music</h1>
    <form id="musicset-form" method="POST" action="{{ route('music.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="file_input_index" id="file-input-index">
        <label for="musicset-name">Name</label>
        <input type="text" name="musicset_name" id="musicset-name" value="{{ old('musicset_name') }}">
        <label for="music_file[0]">Music file 1</label>
        <input type="file" name="music_file[0]" id="music_file[0]">
        <input type="button" id="add-file-input-button" value="+">
        <input type="submit" value="Submit">
    </form>

@endsection

@section('custom-scripts')
    @include('partials.scripts.add_music_file')
@endsection
