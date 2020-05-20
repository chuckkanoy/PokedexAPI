@extends('layout')

@section('content')
    <div class = "content">
        {{$pokemon->links()}}
        @foreach($pokemon as $single)
            <a href="/pokemon/{{$single->id}}"><h1>{{$single -> name}}</h1></a>
            {{$single -> description}}
            @can('capture-pokemon')
        @endforeach
        {{$pokemon->links()}}
    </div>
@endsection
