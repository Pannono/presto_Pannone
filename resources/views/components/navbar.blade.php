<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="{{route('homepage')}}" class="navbar-brand">Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('homepage')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href=" {{route('article.index')}}" class="nav-link" aria-current="page">Tutti gli articoli</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
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
                
                    <li class="nav-item">
                        <a href="{{route('create.article')}}" class="nav-link">Crea Articolo</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        </div>        
    </div>

</nav>