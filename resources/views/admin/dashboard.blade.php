@extends('layouts.backend')

@section('content')

	
	<div class="page-header">
	<h1>Dashboard</h1>
	<p>Welcome {{ Auth::user()->name }}</p>
	</div>
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th><a href="{{ url('/admin/events') }}">Events</a></th>
			</tr>
		</thead>
	</table>
	
	

@stop