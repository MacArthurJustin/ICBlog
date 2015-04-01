@extends('app')

@section('content')
	<section class="blogPost">
		<h1>{{ $post->title }} 
		@if(Auth::check())
			@if(Auth::user()->id == $post->user_id)
				<a href="{{ action('BlogController@edit', $post->id) }}" style="font-size: 14px;">Edit Post</a>
				{!! Form::open(array('action' => array("BlogController@destroyPost", $post->id), 'method' => 'DELETE')) !!}
				{!! Form::submit('Delete Post', array('style' => 'font-size: 14px')) !!}
				{!! Form::close() !!}
			@endif
		@endif
		</h1>
		<h5>By {{ $post->user->name }} on {{ $post->posted_at }}</h5>
		<div class="body">
			@Commonmark($post->body)
		</div>
	</section>
	<hr/>
	<section class="comments">
		<h2>Comments</h2>
		@foreach($post->comments as $comment)
			<article>
				<h5>
					{{ $comment->user->name }}
					@if(Auth::check())
						@if(Auth::user()->id == $comment->user_id)
							{!! Form::open(array('action' => array("BlogController@destroyComment", $comment->id), 'method' => 'DELETE')) !!}
							{!! Form::submit('Delete Comment') !!}
							{!! Form::close() !!}
						@endif
					@endif
				</h5>
				<div class="body">
					{{ $comment->body }}
				</div>
			</article>
		@endforeach
	</section>
	@if(Auth::check())
		<hr/>
		<section class="commentForm">			
			{!! Form::open(array('action' => array("BlogController@storeComment", $post->id))) !!}
		
				<div class="form-group">
					{!! Form::label('body', 'Post:') !!}
					{!! Form::textarea('body', null, array('class' => 'form-control')) !!}
				</div>
		
				<div class="form-group">						
					{!! Form::submit('Comment', array('class' => 'btn btn-primary form-control')) !!}
				</div>
				
			{!! Form::close() !!}
		</section>
	@endif
@endsection
