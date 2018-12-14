@extends('layouts.main')

@section('title', 'Add marker')

@section('content')
    <h1>Add Marker</h1>

    <form id="marker-form" method="POST" action="{{ route('marker.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
		<label for="latitude">Latitude</label>
		<input type="text" name="latitude">

		<label for="longitude">Longitude</label>
		<input type="text" name="longitude">
	
		<label for="name">Name</label>
		<input type="text" name="name">

		<label for="address">Address</label>
		<input type="text" name="address">

        <input type="submit" value="Submit">
    </form>
@endsection
