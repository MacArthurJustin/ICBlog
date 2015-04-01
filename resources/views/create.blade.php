@extends('app')

@section('content')
	<main class="container">
		<h1>Create Blog Posts</h1>
		
		{!! Form::open(array('url' => "post")) !!}
			
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
				{!! Form::input('date', 'posted_at', null, array('class' => 'form-control')) !!}
			</div>
			
			<div class="form-group">
				{!! Form::submit('Post Blog') !!}
			</div>
		
		{!! Form::close() !!}
	</main>
@endsection
