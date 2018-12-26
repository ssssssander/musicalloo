@extends('layouts.main')

@section('title', $marker->name)

@section('content')
    <h1>{{ $marker->name }}</h1>
    <ul>
        <li>
        	<h4>Name</h4>
        	<p>{{ $marker->name }}</p>
        </li>
        <li>
        	<h4>Address</h4>
        	<p>{{ $marker->address }}</p>
        </li>
        <li>
        	<h4>Latitude</h4>
        	<p>{{ $marker->latitude }}</p>
        </li>
        <li>
        	<h4>Longitude</h4>
        	<p>{{ $marker->longitude }}</p>
        </li>
    </ul>
    @include('partials.delete_marker_form')
    <a href="{{ route('marker.edit', ['id' => $marker->id]) }}">Edit marker</a>

@endsection
