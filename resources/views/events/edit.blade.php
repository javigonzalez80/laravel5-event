@extends('layouts.backend')

@section('content')

	<h1>Edit: {!! $event->title !!}</h1>
	
	<hr />
	
	{!! Form::model($event, ['method' => 'PATCH', 'url' => 'admin/events/' . $event->id, 'files' => 'true']) !!}
		
		@include('events.form', ['submitButtonText' =>  'Update Event'])
		
	{!! Form::close() !!}
	
	@include('errors.formerror')
	

@stop