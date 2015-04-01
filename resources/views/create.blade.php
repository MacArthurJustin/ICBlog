@extends('app')

@section('content')
	<h1>Create Blog Posts</h1>
	
	{!! Form::open(array('action' => "BlogController@storePost")) !!}
		
		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title', null, array('class' => 'form-control')) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('body', 'Body:') !!}
			{!! Form::textarea('body', null, array('class' => 'form-control')) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('posted_at', 'Publish on:') !!}
			{!! Form::input('date', 'posted_at', date('Y-m-d'), array('class' => 'form-control')) !!}
		</div>
		
		<div class="form-group">
			{!! Form::submit('Post Blog', array('class' => 'btn btn-primary form-control')) !!}
		</div>
	
	{!! Form::close() !!}
@endsection
