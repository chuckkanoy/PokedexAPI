@extends('layout')

@section('content')
    <h1>Login</h1>

    <form method="POST" action="login">
        @csrf

        <div class="field">
            <label class="label" for="email">Email</label>

            <div class="control">
                <input
                    class="input @error('email') is-danger @enderror"
                    name="email"
                    id="email"
                    value="{{old('email')}}"></input>

                @if($errors->has('email'))
                    <p class="help is-danger">{{$errors->first('email')}}</p>
                @endif
            </div>
        </div>

        <div class="field">
            <label class="label" for="password">Password</label>

            <div class="control">
                <input
                    class="input @error('password') is-danger @enderror"
                    name="password"
                    id="password"
                    value="{{old('password')}}"
                ></input>

                @if($errors->has('password'))
                    <p class="help is-danger">{{$errors->first('password')}}</p>
                @endif
            </div>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Submit</button>
            </div>
        </div>
    </form>
@endsection
