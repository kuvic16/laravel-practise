@foreach ($conversation->replies as $reply)
	<div>
		<header style="display: flex; justify-content: space-between;">
			<p class="m-0"><strong>{{$reply->user->name}} said...</strong></p>
			@if ($reply->is_best())
				<span style="color: green;">Best Reply by user!</span>
			@endif
		</header>
		
		{{$reply->details}}

		@can('update', $conversation)
			<form method="POST" action="/best-replies/{{ $reply->id}}">
				@csrf
				<button type="submit" class="btn p-0 text-muted">Best Reply?</button>
			</form>
		@endcan
		
	</div>

	@continue($loop->last)

	<hr>
@endforeach