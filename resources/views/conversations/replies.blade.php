@foreach ($conversation->replies as $reply)
	<div>
		<p class="m-0">
		<strong>{{$reply->user->name}} said...</strong>
		</p>

		{{$reply->details}}

		@can('update-conversation', $conversation)
			<form method="POST" action="/best-replies/{{ $reply->id}}">
				@csrf
				<button type="submit" class="btn p-0 text-muted">Best Reply?</button>
			</form>
		@endcan
		
	</div>

	@continue($loop->last)

	<hr>
@endforeach