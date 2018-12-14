@extends('layouts.main')

@section('title', 'Map')

@section('content')
	<div class="mapcontainer">
	    <h1>Map</h1>

	    <div id="mapid"></div>
    </div>
    <?php echo config('app.mapbox_token') ?>
@endsection




@section('custom-scripts')
	<script>
		var mymap = L.map('mapid').setView([51.189260, 4.377368], 14);

		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
		    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		    maxZoom: 18,
		    id: 'mapbox.streets',
		    accessToken: '{{ env('MAPBOX_TOKEN') }}'
		}).addTo(mymap);


		var KdGHoboken = L.marker([51.173339, 4.371204]).addTo(mymap);

		KdGHoboken.bindPopup("<b>KdG Hoboken</b><br>Een school");


	</script>
@endsection