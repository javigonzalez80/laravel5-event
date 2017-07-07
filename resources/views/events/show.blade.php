@extends('layouts.backend')

@section('content')

	<a href="{!! URL::previous() !!}" class="btn btn-default">Back</a>
	<a href="{{ route('events.edit', $event->id) }}" class="btn btn-default">Edit</a>
	
	<h1>{{ $event->title }}</h1>
	
	<p>{{ $event->slug }}</p>
	
	<p>{{ $event->description }}</p>
	
	<p>{{ $event->location }}</p>
	
	<img src="{{ asset('img/uploads/'. $event->image) }}" width="auto" height="auto">
	
	<p>Begin:{{ $event->start_time }} - End:{{ $event->end_time }}</p>
	
	
@stop