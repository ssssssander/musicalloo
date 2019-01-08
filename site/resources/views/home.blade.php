@extends('layouts.app')

@section('title', 'Musicalloo')

@section('main')

    @include('partials.nav')

    <section class="home-section" id="home">
        <div class="content-wrapper">
        	<div class="image-wrapper">
        	    <img src="{{ asset('graphics/wckot.svg') }}" alt="toilet loft">
        	</div>
        	<div class="content">
        	    <h1>Musicalloo</h1>
        	    <p>Did you know you spend 92 entire days of your life on the toilet? So why not making something special out of it?</p>
        	    <p>Musicalloo is where toilets meet music. It's simple. When you sit down on the toilet, music starts to play. If someone else enters the stall next to you, the music gets richer. The other person might, for example, add the bass to your song.</p>
        	    <a href="#faq">Want to know how it works?</a>
        	</div>
        </div>
    </section>

    @include('partials.music')
    @include('partials.map')
    @include('partials.faq')
    @include('partials.contact')

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


        <?php
            foreach($markers as $marker)
            {
                echo 'var marker' . $marker->id . ' = L.marker([' . $marker->latitude . ', ' . $marker->longitude . ']).addTo(mymap);';

                echo 'marker' . $marker->id . '.bindPopup("<b>' . $marker->name . '</b><br>' . $marker->address . '");';
            }
        ?>

    </script>

    <script>
        var mobileNav = document.querySelectorAll('.mobile-nav a');
        var navCheckbox = document.getElementById('nav-checkbox');

        mobileNav.forEach(element => {
            element.onclick = function() { navCheckbox.checked = false };
        });

    </script>
@endsection
