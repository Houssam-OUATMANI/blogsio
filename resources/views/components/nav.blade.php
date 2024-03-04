<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route("home")}}">Mon Blog</a>
        <div class="d-flex align-items-center gap-2">
            @guest()
                <a class="btn btn-primary btn-sm" up-target="[layout-main]" up-history=true  href="{{route("auth.register")}}">Inscription</a>
                <a class="btn btn-primary btn-sm" up-target="[layout-main]" up-history=true href="{{route("auth.login")}}">Connexion</a>
            @endguest
            @auth()
                <form action="{{route("auth.logout")}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger btn-sm" type="submit">Deconnexion</button>
                </form>
            @endauth
        </div>
    </div>
</nav>
