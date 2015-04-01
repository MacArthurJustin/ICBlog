@extends('app')

@section('content')
	<main class="container">
		<section class="blogPost">
			<h1>{{ $post->title }} 
			@if(Auth::user()->id == $post->user_id)
				<a href="{{ url("post/{$post->id}/edit") }}" style="font-size: 14px;">Edit Post</a>
			@endif
			</h1>
			<h5>By {{ $post->user->name }} on {{ $post->posted_at }}</h5>
			<div class="body">
				{{ $post->body }}
			</div>
		</section>
		<hr/>
		<section class="comments">
			<h2>Comments</h2>
			@foreach($post->comments as $comment)
				<article>
					<h5>{{ $comment->user->name }}</h5>
					<div class="body">
						{{ $comment->body }}
					</div>
				</article>
			@endforeach
		</section>
		@if(Auth::check())
			<hr/>
			<section class="commentForm">			
				{!! Form::open(array('url' => "comment/{$post->id}")) !!}
			
					<div class="form-group">
						{!! Form::label('body', 'Post:') !!}
						{!! Form::textarea('body', null, array('class' => 'form-control')) !!}
					</div>
			
					<div class="form-group">						
						{!! Form::submit('Comment') !!}
					</div>
					
				{!! Form::close() !!}
			</section>
		@endif
	</main>
@endsection
