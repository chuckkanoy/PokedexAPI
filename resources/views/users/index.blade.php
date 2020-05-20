@extends('layout')

@section('content')
    <div class = "content">
        {{$users->links()}}
        @foreach($users as $single)
            <a href="/users/{{$single->id}}"><h1>{{$single -> name}}</h1></a>
            {{$single -> email}}
        @endforeach
        {{$users->links()}}
    </div>
@endsection
