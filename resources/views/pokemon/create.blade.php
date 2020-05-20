@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1>New Pokemon</h1>
            <form method="POST" action="/pokemon">
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
                    <label class="label" for="description">Description</label>

                    <div class="control">
                        <textarea
                            class="textarea @error('description') is-danger @enderror"
                            name="description"
                            id="description">{{old('description')}}</textarea>

                        @if($errors->has('description'))
                            <p class="help is-danger">{{$errors->first('description')}}</p>
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
