@foreach ($conversation->replies as $reply)
	<div>
		<p class="m-0">
		<strong>{{$reply->user->name}} said...</strong>
		</p>

		{{$reply->details}}
	</div>

	@continue($loop->last)

	<hr>
@endforeach