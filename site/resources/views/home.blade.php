@extends('layouts.app')

@section('title', 'Musicalloo')

@section('main')
    <section class="home-section">
        <img src="{{ asset('graphics/wckot.svg') }}" alt="toilet loft">
        <div class="content">
            <h1>Musicalloo</h1>
            <p>Did you know you spend 92 entire days of your life on the toilet? Then why not making something special out of it?</p>
            <p>Musicalloo is where toilet meets music. It's simple. When you are sitting down on the toilet, music starts to play. If someone else enters the stall next to you, the music gets richer.</p>
            <a href="#">Want to know how it works?</a>
        </div>
    </section>

    <section class="music-section">
        <div class="content">
            <h1>What are you listening to?</h1>

            <label>
                <input type="checkbox" class="dd-input">
                <div class="dropdown">
                	<div class="dropdown-title">Theater / Cinema <span class="arrow-down"></span></div>
                	<div class="dropdown-content">
                	    <p>filler text - filler text</p>
                	    <p>filler text - filler text</p>
                	    <p>filler text - filler text</p>
                	</div>
                </div>
            </label>

            <label>
                <input type="checkbox" class="dd-input">
                <div class="dropdown">
                	<div class="dropdown-title">Theater / Cinema <span class="arrow-down"></span></div>
                	<div class="dropdown-content">
                	    <p>filler text - filler text</p>
                	    <p>filler text - filler text</p>
                	    <p>filler text - filler text</p>
                	</div>
                </div>
            </label>

            <label>
                <input type="checkbox" class="dd-input">
                <div class="dropdown">
                	<div class="dropdown-title">Theater / Cinema <span class="arrow-down"></span></div>
                	<div class="dropdown-content">
                	    <p>filler text - filler text</p>
                	    <p>filler text - filler text</p>
                	    <p>filler text - filler text</p>
                	</div>
                </div>
            </label>
        </div>

        <img src="{{ asset('graphics/wcborstel.svg') }}" alt="toilet brush">
    </section>

    <section class="map-section">
        <h1>Where can you find musicalloo's?</h1>
        <div id="mapid"></div>
    </section>

    <section class="faq-section">
        <img src="{{ asset('graphics/wcpapier.svg') }}" alt="toilet paper">
        <div class="content">
            <h1>Frequently asked questions</h1>
            <p class="question">How do we do it?</p>
            <p>We use an <a href="#">arduino</a>!</p>
            <p>How do we know you're there?<br>An ultrasonic sensor detects whether something is in front of it, in this case, that something is you, sitting on the loo.</p>
            <p>
            How does it play the music?<br>
            The music is saved on an SD card, and the Arduino is connected to speakers. Music can be manually put on the SD card or uploaded over wifi. When the proximity sensor detects someone doing their business, it sends a signal, and the appropriate music is played.
            </p>
        </div>
    </section>

    <section class="contact-section">
        <div class="content">
            <h1>Contact</h1>
            <form action="">
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="textarea" placeholder="Message">
                <button type="submit">Send</button>
            </form>
        </div>
        <img src="{{ asset('graphics/wcpot.svg') }}" alt="toilet">
    </section>
@endsection

@section('custom-scripts')
	<script>
		var mymap = L.map('mapid').setView([51.189260, 4.377368], 12);

		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
		    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		    maxZoom: 18,
		    id: 'mapbox.streets',
		    accessToken: '{{ env('MAPBOX_TOKEN') }}'
		}).addTo(mymap);


		// <?php
		// 	foreach($markers as $marker)
		// 	{
		// 		echo 'var marker' . $marker->id . ' = L.marker([' . $marker->latitude . ', ' . $marker->longitude . ']).addTo(mymap);';

		// 		echo 'marker' . $marker->id . '.bindPopup("<b>' . $marker->name . '</b><br>' . $marker->address . '");';
		// 	}
		// ?>

	</script>
@endsection
