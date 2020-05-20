@extends('layout')

@section('content')
    <div class = "content">
        {{$pokemon->links()}}
        @foreach($users as $single)
            <a href="/user/{{$single->id}}"><h1>{{$single -> name}}</h1></a>
            {{$single -> email}}
        @endforeach
        {{$users->links()}}
    </div>
@endsection
