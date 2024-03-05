@extends("layout")

@section("title", "reset password")

@section("body")

<h1 class="text-center">reset password</h1>

<form action="" method="post">
    @csrf
    @include("components.input", [
    "name" => "email",
    "label" => "Votre email",
    "type" => "email",
    "value" => old("email")
    ])
    <button class="btn btn-outline-success" type="submit">Reset</button>

</form>


@endsection
