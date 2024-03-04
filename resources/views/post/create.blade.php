@extends("layout")

@section("title", "Ajouter une publication")

@section("body")

    <h1>Ajouter une publication</h1>

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        @include("components.input", ["name" => "title" , "label" => "titre du post", "value" => old("title") ])
        @include("components.input", ["name" => "image_path" , "label" => "image", "value" => old("image_path"), "type" => "file" ])
        @include("components.input", ["name" => "content" , "label" => "Contenu", "value" => old("content"), "type" => "textarea" ])
        <button class="btn btn-success" type="submit">Ajouter</button>
    </form>
@endsection
