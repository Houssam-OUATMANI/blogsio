@extends("layout")

@section("title", "page de connexion")

@section("body")

    <h1 class="text-center">page de connexion</h1>

    <form action="" method="post">
        @csrf
        @include("components.input", [
                                      "name" => "email",
                                      "label" => "Votre email",
                                      "type" => "email",
                                      "value" => old("email")
                                     ])
        @include("components.input", ["name" => "password",
                                      "label" => "Mot de passe",
                                      "type" => "password",
                                      "value" => old("password")
                                      ])
        <button class="btn btn-outline-success" type="submit">Connexion</button>

    </form>


@endsection
