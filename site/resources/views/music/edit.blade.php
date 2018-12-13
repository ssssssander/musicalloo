@extends('layouts.main')

@section('title', 'Edit music')

@section('content')
    <h1>Edit music</h1>
    <form method="POST" action="{{ route('music.update', ['id' => $musicSet->id]) }}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <label for="musicset-name">Name</label>
        <input type="text" name="musicset_name" id="musicset-name" value="{{ old('musicset_name') ?? $musicSet->name }}">
        <input type="submit" value="Submit">
    </form>
    @include('partials.delete_musicset_form')
@endsection
