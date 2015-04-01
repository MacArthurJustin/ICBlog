@extends('app')

@section('content')
	<h1>Edit Users</h1>
	
	@foreach($users as $user)
		<div>
		<h3>{{ $user->name }}</h3>
		{!! Form::open(array('action' => array('BlogController@updateUser', $user->id), 'method' => 'PUT')) !!}
		{!! Form::label('author', 'Author?') !!}
		{!! Form::checkbox('author', 'true', ($user->level > 0)) !!}
		{!! Form::submit('Save') !!}
		{!! Form::close() !!}
		</div>
		<hr />
	@endforeach
@endsection
