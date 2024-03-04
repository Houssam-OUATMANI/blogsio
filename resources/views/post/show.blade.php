@extends("layout")

@section("title", $post->title)


@section("body")


    <h1>{{$post->title}}</h1>
    <br>

    <img src="/storage/{{$post->image_path}}">
    <div>{{$post->content}}</div>
    <p>Ecrit par : {{$post->user->username}}</p>
@endsection
