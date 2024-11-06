<nav class="navbar navbar-expand-lg navbar-light bg-t">
    <div class="container-fluid">
        <a href="{{route('homepage')}}" class="navbar-brand text-white">Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('homepage')}}" class="nav-link text-white">Home</a>
                </li>
                <li class="nav-item">
                    <a href=" {{route('article.index')}}" class="nav-link text-white" aria-current="page">Tutti gli articoli</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a href="{{route('byCategory', ['category' => $category])}}" class="dropdown-item text-capitalize">{{$category->name}}</a>
                            </li>
                            @if (!$loop->last)
                                <hr class="dropdown-divider">
                            @endif
                        @endforeach
                    </ul>
                </li>
                @auth
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a href="{{route('revisor.index')}}" class="nav-link btn btn-outline-success btn-sm position-relative w-sm-25 text-white">Zona revisore
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ \App\Models\Article::toBeRevisedCount() }}</span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('create.article')}}" class="nav-link text-white">Crea Articolo</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ciao, {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item"
                                onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                            </li>
                            <form action="{{route('logout')}}" method="POST" class="d-none" id="form-logout">@csrf</form>
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ciao, utente!
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('login')}}" class="dropdown-item">Accedi</a></li>
                            <hr class="dropdown-divider">
                            <li><a href="{{route('register')}}" class="dropdown-item">Registrati</a></li>
                        </ul>
                    </li>
                @endauth
            </ul>
            <form action="{{route('article.search')}}" method="GET" role="search" class="d-flex ms-auto">
                <div class="input-group">
                    <input type="search" name="query" class="form-control" placeholder="Cerca..." aria-label="search">
                    <button type="submit" class="input-group-text btn btn-outline-success" id="basic-addon2">
                        Search
                    </button>
                </div>
            </form>
            <x-_locale lang="it" />
            <x-_locale lang="en" />
            <x-_locale lang="es" />
        </div>        
    </div>

</nav>