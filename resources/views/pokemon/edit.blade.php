@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1>Update Pokemon</h1>
            <form method="POST" action="/pokemon/{{$pokemon -> id}}">
                @csrf
                @method('PUT')

                <div class="field">
                    <label class="label" type="text" name="name" id="name">Name</label>

                    <div class="control">
                        <input class="input" type="text" name="name" id="name" value="{{$pokemon->name}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="description">Description</label>

                    <div class="control">
                        <textarea class="textarea" name="description" id="description">{{$pokemon -> description}}</textarea>
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
