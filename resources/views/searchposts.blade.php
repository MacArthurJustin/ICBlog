@extends('app')

@section('content')
	<h1>Blog Posts containing &quot;{{$query}}&quot;</h1>
	
	@foreach($posts as $post)
		<article>
			<h2><a href="{{ action('BlogController@show', $post->id) }}">{{ $post->title }}</a></h2>
			<h5>by {{ $post->user->name }} on {{ $post->posted_at }}</h5>
			<div class="body">
				@Commonmark(str_limit($post->body, $limit = 500, $end = '...'))
			</div>
			<div>
				<a href="{{ action('BlogController@show', $post->id) }}">Read More</a>
			</div>
		</article>
		<hr />
	@endforeach
@endsection
