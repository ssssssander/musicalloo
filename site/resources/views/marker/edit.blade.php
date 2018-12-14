@extends('layouts.main')

@section('title', 'Edit marker')

@section('content')
    <h1>Edit marker</h1>

    <form id="marker-form" method="POST" action="{{ route('marker.update', ['id' => $marker->id]) }}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
		<label for="latitude">Latitude</label>
		<input type="text" name="latitude" value="{{ $marker->latitude }}">

		<label for="longitude">Longitude</label>
		<input type="text" name="longitude" value="{{ $marker->longitude }}">
	
		<label for="name">Name</label>
		<input type="text" name="name" value="{{ $marker->name }}">

		<label for="address">Address</label>
		<input type="text" name="address" value="{{ $marker->address }}">

        <input type="submit" value="Submit">
    </form>
@endsection
