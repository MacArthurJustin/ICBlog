@extends('app')

@section('content')
	<h1>Edit Blog Posts</h1>
	
	{!! Form::open(array('action' => array("BlogController@updatePost", $post->id), 'method' => 'PUT')) !!}
		
		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{{ $post->title }}
		</div>
		
		<div class="form-group">
			{!! Form::label('body', 'Body:') !!}
			{!! Form::textarea('body', $post->body, array('class' => 'form-control')) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('posted_at', 'Publish on:') !!}
			{!! Form::input('date', 'posted_at', $post->posted_at, array('class' => 'form-control')) !!}
		</div>
		
		<div class="form-group">
			{!! Form::submit('Edit Blog', array('class' => 'btn btn-primary form-control')) !!}
		</div>
	
	{!! Form::close() !!}
@endsection
