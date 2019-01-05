@extends('layouts.app')

@section('title', 'Musicalloo')

@section('main')
    <nav>
        <a href="#home">Home</a>
        <a href="#music">Music</a>
        <a href="#map">Map</a>
        <a href="#faq">FAQ</a>
        <a href="#contact">Contact</a>
    </nav>

    <label class="burger-menu">
        <img src="{{ asset('graphics/bars-solid.svg') }}" alt="menu">
        <input type="checkbox" id="nav-checkbox" class="checkbox-input">
        <nav class="mobile-nav">
            <a href="#home">Home</a>
            <a href="#music">Music</a>
            <a href="#map">Map</a>
            <a href="#faq">FAQ</a>
            <a href="#contact">Contact</a>
        </nav>
    </label>


    <section class="home-section" id="home">
        <div class="content-wrapper">
        	<div class="image-wrapper">
        	    <img src="{{ asset('graphics/wckot.svg') }}" alt="toilet loft">
        	</div>
        	<div class="content">
        	    <h1>Musicalloo</h1>
        	    <p>Did you know you spend 92 entire days of your life on the toilet? Then why not making something special out of it?</p>
        	    <p>Musicalloo is where toilet meets music. It's simple. When you are sitting down on the toilet, music starts to play. If someone else enters the stall next to you, the music gets richer.</p>
        	    <a href="#">Want to know how it works?</a>
        	</div>
        </div>
    </section>

    <section class="music-section" id="music">
        <div class="content-wrapper">
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
        </div>
    </section>

    <section class="map-section" id="map">
        <div class="content-wrapper">
            <h1>Where can you find musicalloo's?</h1>
            <div id="mapid"></div>
        </div>
    </section>

    <section class="faq-section" id="faq">
        <div class="content-wrapper">
            <img src="{{ asset('graphics/wcpapier.svg') }}" alt="toilet paper">
            <div class="content">
                <h1>Frequently asked questions</h1>
                <p class="question">How do we do it?</p>
                <p>We use an <a href="#">arduino</a>!</p>
                <p>How do we know you're there?<br>An ultrasonic sensor detects when something is in front of it. In this case, that something is you sitting on the loo.</p>
                <p>
                How does it play music?<br>
                The music is saved on an SD card and the Arduino is connected to speakers. Music can be manually put on the SD card or uploaded over wifi. When the proximity sensor detects someone doing their business, it sends a signal, and the appropriate music is played.
                </p>
            </div>
        </div>
    </section>

    <section class="contact-section" id="contact">
        <div class="content-wrapper">
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
        </div>
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

    <script>
        var mobileNav = document.querySelectorAll('.mobile-nav a');
        var navCheckbox = document.getElementById('nav-checkbox');

        mobileNav.forEach(element => {
            element.onclick = function() { navCheckbox.checked = false };
        });

    </script>
@endsection
