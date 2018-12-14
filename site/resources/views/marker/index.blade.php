@extends('layouts.main')

@section('title', 'Markers')

@section('content')
    <h1>Markers Index</h1>

    <h1><a href="{{ route('marker.create') }}">CREATE</a></h1>

    <ul>
        @forelse ($markers as $marker)
            <li>
                <a href="{{ route('marker.show', ['id' => $marker->id]) }}">{{ $marker->name }}</a>
                <a href="{{ route('marker.edit', ['id' => $marker->id]) }}">Edit</a>
                
            </li>
        @empty
            Nothing here
        @endforelse
    </ul>
@endsection
