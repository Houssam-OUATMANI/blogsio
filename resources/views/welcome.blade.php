@extends("layout")

@section("title", "Bienvenue sur mon blog")


@section("body")
    {{ $name }}
    <br>
    <?php echo $name ?>

@endsection

