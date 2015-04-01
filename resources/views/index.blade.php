@extends('app')

@section('content')
	<main class="container">
		<h1>Blog Posts</h1>
		
		@foreach($posts as $post)
			<article>
				<h2><a href="{{ url("post/{$post->id}") }}">{{ $post->title }}</a></h2>
				<h5>by {{ $post->user->name }} on {{ $post->posted_at }}</h5>
				<div class="body">
					{{ str_limit($post->body, $limit = 200, $end = '...') }}
				</div>
				<div>
					<a href="{{ url("post/{$post->id}") }}">Read More</a>
				</div>
			</article>
			<hr />
		@endforeach
	</main>
@endsection
