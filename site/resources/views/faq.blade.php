@extends('layouts.app')

@section('title', 'Home')

@include('partials.nav')
@section('main')
    <main>
        <div class="content">
            <h1>How do we do it?</h1>
            <p>
                We use an <a href="https://www.arduino.cc/">arduino</a>! How do we know you're there? An ultrasonic sensor detects whether something is in front of it, in this case, that something is you, sitting on the loo. How does it play the music? The music is saved on an SD card, and the Arduino is connected to speakers. Music can be manually put on the SD card or uploaded over wifi. When the proximity sensor detects someone doing their business, it sends a signal, and the appropriate music is played.
            </p>
        </div>

        @include('partials/toilet')

    </main>
@endsection
