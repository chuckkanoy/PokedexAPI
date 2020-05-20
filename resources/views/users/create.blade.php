@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1>New User</h1>
            <form method="POST" action="/users">
                @csrf

                <div class="field">
                    <label class="label" type="text" name="name" id="name">Name</label>

                    <div class="control">
                        <input
                            class="input @error('name') is-danger @enderror"
                            type="text"
                            name="name"
                            id="name"
                            value="{{old('name')}}"
                        >

                        @if($errors->has('name'))
                            <p class="help is-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                </div>

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
        </div>
    </div>
@endsection
