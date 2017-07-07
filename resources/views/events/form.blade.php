		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('slug', 'URL:') !!}
			{!! Form::text('slug', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('description', 'Description:') !!}
			{!! Form::text('description', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('location', 'Location:') !!}
			{!! Form::text('location', null, ['id' => 'location', 'class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('image', 'Image:') !!}
			{!! Form::file('image', ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('start_time', 'Begin:') !!}
			<div class='input-group date' id='datetimepicker1'>
			{!! Form::text('start_time', $event->start_time->format('Y-m-d H:i'), ['class' => 'form-control']) !!}
			<span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
            </span>
            </div>
		</div>
		
		<div class="form-group">
			{!! Form::label('end_time', 'End:') !!}
			<div class='input-group date' id='datetimepicker2'>
			{!! Form::text('end_time', $event->end_time->format('Y-m-d H:i'), ['class' => 'form-control']) !!}
			<span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
            </span>
            </div>
		</div>
		
		<div class="form-group">
			{!! Form::submit($submitButtonText, ['id' => 'submit', 'class' => 'btn btn-primary form-control']) !!}
		</div>
		
		@section('footer')
		
		<script>
				$(function () {
					$('#datetimepicker1').datetimepicker({
						format: 'YYYY-MM-DD HH:mm',
						sideBySide: true
					});
				});
		</script>
		
		<script>
				$(function () {
					$('#datetimepicker2').datetimepicker({
						format: 'YYYY-MM-DD HH:mm',
						sideBySide: true
					});
				});
		</script>
		
		@stop
		