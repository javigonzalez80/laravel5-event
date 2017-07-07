@extends('layouts.backend')

@section('content')

	<h1>Events</h1>
	
	<p><a href="{{ url('admin/events/create') }}">Create Event</a></p>
	<hr/>
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Title</th>
				<th>Description</th>
				<th>Show Event</th>
				<th>Edit Event</th>
				<th>Delete Event</th>
			</tr>
		</thead>
		<tbody>
		
	
	@foreach ($events as $event)
		
		<tr>
				<td>{{ $event->id }}</td>
				<td>{{ $event->title }}</td>
				<td>{{ $event->description }}</td>
				<td><a href="{{ route('events.show', $event->id) }}">Show</a></td>
				<td><a href="{{ route('events.edit', $event->id) }}">Edit</a></td>
				<td>
					{!! Form::open([
						'method' => 'DELETE',
						'route' => ['events.destroy', $event->id]
					]) !!}
					{!! Form::submit('Delete Event?', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			
		
	@endforeach

		</tbody>
	</table>

@stop