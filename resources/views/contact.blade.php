@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">Contact with us</h1>

            <form method="POST" action="/contact">
                @csrf
                <div class="field">
                    <label for="email" class="label">Email</label>
                    <div class="control">
                        <input 
                            type="email" 
                            name="email" 
                            class="input @error('email') is-danger @enderror" 
                            id="email"
                            value="{{old('email')}}">
                        
                        @error('email')
                            <p class="text-red-500 help is-danger">{{$errors->first('email')}}</p>
                        @enderror
                    </div>
                </div>            
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Email Me</button>
                    </div>
                </div>

                @if(session('message'))
                <div>
                    {{session('message')}}
                </div>
                @endif

            </form>
        </div>
    </div>
@endsection