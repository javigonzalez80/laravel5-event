@extends('layouts.frontend')

@section('title', 'Event List')

@section('description', 'Laravel 5 List View')

@section('content')

	<h1>All Events</h1>
	
	<hr/>
	
	@if (count($events) < 1)
		<p><strong>No Events found ...</strong></p>
	@else
	
	@foreach ($events as $event)
	
		<article>
		
			<h2>
			<a href="{{ url('/event', $event->slug) }}">{{ $event->title }}</a>
			</h2>     
		
		</article> 
	
	@endforeach
	
	@endif
	
@stop
