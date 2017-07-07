@extends('layouts.frontend')

@section('title', 'Event Calendar')

@section('description', 'Laravel 5 Calendar View')

@section('content')

	<h1>Events this Month</h1>
	
	<p><a href="{{ url('/list') }}">All Events</a></p>
	
	<hr/>
	
	<div id='calendar'>
	
	</div>

@stop
	
@section('footer')
		
	<script>
	$(document).ready(function() {
		
		var base_url = '{{ url('/') }}';
		
		$('#calendar').fullCalendar({
			eventClick: function(calEvent, jsEvent, view) {
 
                $(this).css('background', 'red');
            },
			weekends: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: base_url + '/fullcalendar',
				error: function() {
					alert("cannot load json");
				}
			},
			timeFormat: 'H(:mm)' 
		});
		
		
    });
	</script>
		
		
@stop


