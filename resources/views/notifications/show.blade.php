@extends('layout')

@section('content')
    <div class="container">
        show all notification for user

        <ul>
            @forelse ($notifications as $notification)
                <li>
                    @if ($notification->type === 'App\Notifications\PaymentReceived')
                        We have received a payment of {{$notification->data['amount']}} from you.            
                    @endif
                </li>
            @empty
                <li>You have no unread notifications</li>
            @endforelse
        </ul>
    </div>
@endsection