@extends('layouts.frontend')

@section('title', 'Event')

@section('description', 'Laravel 5 Event')

@section('content')

	<a href="{!! URL::previous() !!}" class="btn btn-default">Back</a>
	<h1>{{ $event->title }}</h1>
	<img src="{{ asset('img/uploads/'. $event->image) }}" width="auto" height="auto">
	
	<hr/>
	
	<p>{{ $event->description }}</p>
	
	<p>{{ $event->location }}</p>
	
	<p>Begin:{{ $event->start_time }} - End:{{ $event->end_time }}</p>
	
	<div id="map"></div>
@stop

@section('footer')
	<script>
		function initMap() {
			var myLatLng = {lat: {{ $event->lat }}, lng: {{ $event->lng }} };

			var map = new google.maps.Map(document.getElementById('map'), {
			  zoom: 8,
			  center: myLatLng
			});

			var marker = new google.maps.Marker({
			  position: myLatLng,
			  map: map,
			  title: 'Event Location'
			});
			
		}
		
	  
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}&callback=initMap"
    async defer>
	</script>
		
		
@stop
