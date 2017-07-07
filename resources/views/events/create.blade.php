@extends('layouts.backend')

@section('content')

	<h1>Create Event</h1>
	
	<hr />
	
	{!! Form::model($event = new \App\Event, ['url' => 'admin/events', 'files' => 'true']) !!}
	
		@include('events.form', ['submitButtonText' =>  'Create Event'])
	
	{!! Form::close() !!}
	
	@include('errors.formerror')
	
	
@stop
