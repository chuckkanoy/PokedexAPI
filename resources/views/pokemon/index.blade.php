@extends('layout')

@section('content')
    <div class = "content">
        @foreach($pokemon as $single)
            <a href="/pokemon/{{$single->id}}"><h1>{{$single -> name}}</h1></a>
            {{$single -> description}}
        @endforeach
    </div>
@endsection
