@extends('layouts.main')

@section('title', $musicSet->name)

@section('content')
    <h1>{{ $musicSet->name }}</h1>
    <ul>
        @forelse ($musicFiles as $musicFile)
            <li>
                <audio controls>
                    <source src="{{ asset('storage/' . $musicFile->path) }}"
                        type="{{ mime_content_type('storage/' . $musicFile->path) }}">
                    Your browser does not support the audio element.
                </audio>
            </li>
        @empty
            Nothing here
        @endforelse
    </ul>
    @include('partials.delete_musicset_form')
    <a href="{{ route('music.edit', ['id' => $musicSet->id]) }}">Edit music set</a>
@endsection
