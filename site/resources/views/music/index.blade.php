@extends('layouts.main')

@section('title', 'All your music')

@section('content')
    <h1>Music</h1>
    <h1><a href="{{ route('music.create') }}">CREATE</a></h1>
    <ul>
        @forelse ($musicSets as $musicSet)
            <li>
                <a href="{{ route('music.show', ['id' => $musicSet->id]) }}">{{ $musicSet->name }}</a>
                <a href="{{ route('music.edit', ['id' => $musicSet->id]) }}">Edit</a>
                @include('partials.delete_musicset_form')
            </li>
        @empty
            Nothing here
        @endforelse
    </ul>
@endsection

@section('custom-scripts')
    <script>
        if (sessionStorage.getItem('fileInputIndex')) {
            sessionStorage.removeItem('fileInputIndex');
        }
    </script>
@endsection
