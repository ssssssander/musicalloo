@extends('layouts.main')

@section('title', $musicSet->name)

@section('content')
    <h1>{{ $musicSet->name }}</h1>
    <ul>
        @forelse ($musicFiles as $musicFile)
            <li>
                <audio controls>
                    <source src="{{ url('storage/' . $musicFile->path) }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </li>
        @empty
            Nuthin here
        @endforelse
    </ul>
@endsection
