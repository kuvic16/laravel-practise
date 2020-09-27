@extends('layout')

@section('content')
	<p>
		<a href="/conversations">Back</a>
	</p>

	<h1>{{ $conversation->title }}</h1>
	<p class="text-muted">Posted by {{ $conversation->user->name}}</p>
	<div>
		{{$conversation->description}}
	</div>

	<hr>

	@include ('conversations.replies')
@endsection