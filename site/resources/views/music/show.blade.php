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
                <a href="{{ route('music.edit', ['id' => $musicSet->id]) }}">Edit</a>
                @include('partials.delete_music_set')
            </li>
        @empty
            Nothing here
        @endforelse
    </ul>
@endsection
