@extends('layouts.app')

@section('title', 'All your music')

@section('admin')
    <h1>Music</h1>
    <a class="create-link" href="{{ route('music.create') }}">CREATE</a>
    <ul>
        @forelse ($musicSets as $musicSet)
            <li>
                <a href="{{ route('music.show', ['id' => $musicSet->id]) }}">{{ $musicSet->name }}</a>
                <div class="crud-space">
                    <a class="button" href="{{ route('music.edit', ['id' => $musicSet->id]) }}">Edit</a>
                    @include('partials.delete_musicset_form')
                </div>
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
