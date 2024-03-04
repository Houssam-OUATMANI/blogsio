@extends("layout")

@section("title", "Modifier une publication")

@section("body")

    <h1>Modifier une publication</h1>

    <form action="{{route("post.update", $post)}}" method="post" enctype="multipart/form-data">
        @csrf
        @include("components.input", ["name" => "title" , "label" => "titre du post", "value" => $post->title ])
        @include("components.input", ["name" => "image_path" , "label" => "image", "value" => old("image_path"), "type" => "file" ])
        @include("components.input", ["name" => "content" , "label" => "Contenu", "value" => $post->content, "type" => "textarea" ])
        <button class="btn btn-success" type="submit">Modifier</button>
    </form>
@endsection
