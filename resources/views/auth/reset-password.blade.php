@extends("layout")

@section("title", "page de connexion")

@section("body")

    <h1 class="text-center">RESET PASSWORD</h1>

    <form action="{{route('password.update')}}" method="post">
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
        @include("components.input", ["name" => "password_confirmation",
                                     "label" => "Mot de passe confirmartion",
                                     "type" => "password",
                                     "value" => old("password")
                                     ])
        <input type="hidden" name="token" value="{{$token}}">
        <button class="btn btn-outline-success" type="submit">Connexion</button>

    </form>

    <a href="{{route('password.request')}}" class="btn btn-warning">MOT DE PASSE OUBLIE</a>


@endsection
