@extends('layout')

@section('content')
    <div class="control">
        <form method="POST" action="/payments">
            @csrf
            <button class="button is-link" type="submit">Make Payment</button>
        </form>
    </div>
@endsection