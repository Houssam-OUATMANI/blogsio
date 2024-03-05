@extends("layout")

@section("title", "Bienvenue sur mon blog")


@section("body")
    @auth()
    <div>
        <a class="btn btn-success" href="{{route("post.create")}}">Ajouter des posts</a>
        {{\Illuminate\Support\Facades\Auth::user()->username}}
    </div>
    @endauth
    @foreach($posts as $post)
        <div class="card my-3 p-2">
            <h2>{{$post->title}}</h2>
            <p>{{$post->content}}</p>
            <p>Ecrit pat {{$post->user->username}}</p>
            <a href="{{ route("post.show", $post)  }}">Lire la suite</a>

            @can("update", $post)
                <a href="{{route("post.edit", $post)}}">Editer</a>
                <form action="{{route("post.destroy", $post)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit">Supprimer</button>
                </form>
            @endcan

        </div>
    @endforeach

    {{$posts->links()}}
@endsection
