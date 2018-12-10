@extends('layouts.main')

@section('title', 'All your music')

@section('content')
    <h1>Music</h1>
    <h1>Lijst van muziek enzo (READ)</h1>
    <a href="{{ route('music.create') }}">CREATE</a>
@endsection
