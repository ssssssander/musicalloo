@extends('layouts.app')

@section('title', 'Home')

@section('main')
    <main>
        <h1>Musicalloo</h1>
        <div class="content">
            <p>
                Did you know you spend about 92 entire days sitting on the toilet? 92 entire days - it's no wonder you try looking for something fun to do, like reading a book or checking your ex's embarrassing twitter updates.
            </p>
            <p class="large_p">
                So why not make something cool out of the toilet experience?
                <br><span class="">That's what we did.</span>
            </p>
            <p>
                Musicalloo is where toilets meet music. It's simple: you sit down on the toilet, and the music begins to play. If someone else enters the stall next to you, the music gets richer. <a href="{{ url('/faq') }}">Want to know how it works?</a>
            </p>
        </div>

        <div class="toilet-wrapper">
            <img class="music-note1" src="svg/music_note.svg" alt="note">
            <img class="music-note2" src="svg/music_note2.svg" alt="note">
            <img class="music-note3" src="svg/music_note2.svg" alt="note">
            <img class="toilet-image" src="svg/toilet.svg" alt="toilet">
        </div>

    </main>
@endsection
