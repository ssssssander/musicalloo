@extends('layouts.main')

@section('title', 'All your music')

@section('content')
    <h1>Music</h1>
    <h1>Lijst van muziek enzo (READ) <a href="{{ route('music.create') }}">CREATE</a></h1>
    <ul>
        @forelse ($musicSets as $musicSet)
            <li><a href={{ route('music.show', ['id' => $musicSet->id]) }}>{{ $musicSet->name }}</a></li>
        @empty
            Nuthin here
        @endforelse
    </ul>
@endsection
