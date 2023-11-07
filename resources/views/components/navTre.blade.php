<nav class="navbar navbar-expand-lg navBarTre px-2" id="nav">
    <div class="container-fluid px-0">
        <a class="navbar-brand fs-2 ps-3" href="{{ route('homepage') }}">
            Affari.it
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <button
                        class="btn border border-dark  btn-category d-flex justify-content-center align-items-center"
                        type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop"
                        aria-controls="staticBackdrop">
                        <div>
                            <i class="bi bi-list fs-4 text-dark"></i>
                        </div>
                        <div>
                            <p class="m-0 ps-2 categoriePulsante">
                                Categorie
                            </p>
                        </div>
                    </button>
                </li>
                @auth

                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a href="{{ route('revisor.index') }}">
                                <button type="button"
                                    class="btn text-dark border-dark position-relative btn-revisore ms-3">
                                    <p class="m-0 ps-2 categoriePulsante">

                                        {{ __('ui.zona-revisore') }}

                                    </p>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ App\Models\Announcement::toBeRevisionedCount() }}
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </button>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item px-3">
                        <a class="nav-link inserisciAnnuncio" href="{{ route('announcement.create') }}">
                            {{ __('ui.inserisci-annuncio') }}
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('ui.ciao') }} {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="/logout"
                                    onclick="event.preventDefault();getElementById('form-logout').submit()">
                                    <div class="d-flex  align-items-center border-bottom">
                                        <i class="bi bi-box-arrow-right ps-1 fs-5"></i>
                                        <p class="title-logout m-0 ps-3">
                                            Logout
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <form id="form-logout" action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('POST')
                            </form>
                        </ul>
                    </li>
                @endauth
            </ul>
            <div class="">

                <x-_locale lang='it' nation='it' />

            </div>

            <div class="">

                <x-_locale lang='en' nation='gb' />

            </div>

            <div class="me-5">

                <x-_locale lang='es' nation='es' />

            </div>
            <form action="{{ route('announcement.search') }}" method="GET" class="d-flex" role="search">
                <input class="form-control me-2 cercAA" name="searched" type="search"
                    placeholder="{{ __('ui.ricerca') }}" aria-label="Search">
                <button class="btn btn-outline-dark pulsante-cerca" type="submit">Cerca</button>
            </form>
            @guest
                <!--Login-->
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="67" height="67" fill="#444444"
                        class="btn bi bi-person-fill pe-3" type="image" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    </svg>
                </div>
                <!--Login-->
            @endguest
        </div>
    </div>
</nav>


<!--NAV-TOP-->
<div class="nav-top d-flex justify-content-center align-items-center pt-1 px-2 border-bottom">
    <form action="{{ route('announcement.search') }}" method="GET" class="d-flex" role="search">
        <input class="form-control me-2 cercAA" name="searched" type="search" placeholder="{{ __('ui.ricerca') }}"
            aria-label="Search">
        <button class="btn btn-outline-dark" style="background-color:#444444;color:#f5f5f5";
            type="submit">Cerca</button>
    </form>
    <!--BANDIERE-->
    <div class="d-flex justify-content-between">
        <div class="">

            <x-_locale lang='it' nation='it' />

        </div>

        <div class="">

            <x-_locale lang='en' nation='gb' />

        </div>

        <div class="">

            <x-_locale lang='es' nation='es' />

        </div>
    </div>
    <!--BANDIERE-->
</div>
<!--NAV-TOP-->


<!--START-NAVBAR-BOTTOM-->
<div class="nav-bottom d-flex justify-content-between align-items-center border-top px-2 ">
    <div class="text-center">
        <a href="{{ route('homepage') }}">
            <i class="bi bi-house-fill fs-4 iconeNavBottom text-light"></i>
            <p class="text-light m-0 title-navbarBottom pb-1">
                Homepage
            </p>
        </a>
    </div>
    <div class="text-center">
        <button class="btn-category-nav-bottom" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">

            <i class="bi bi-search fs-4 iconeNavBottom text-light"></i>
            <p class="text-light m-0 title-navbarBottom pb-1">
                Categorie
            </p>
        </button>
    </div>
    @auth
        <div class="text-center">
            @if (Auth::user()->is_revisor)
                <a href="{{ route('revisor.index') }}">
                    <button type="button" class="btn  position-relative border btn-revisore btnRevisoreBottom">
                        <i class="bi bi-bell-fill fs-4 iconeNavBottom text-light"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger notifiche">
                            {{ App\Models\Announcement::toBeRevisionedCount() }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </button>
                    <p class="text-light m-0 title-navbarBottom pb-1">
                        Revisiona
                    </p>
                </a>
            @endif
        </div>
        <div class="text-center">
            <a href="{{ route('announcement.create') }}">
                <i class="bi bi-plus-circle-fill fs-4 iconeNavBottom text-light"></i>
                <p class="text-light m-0 title-navbarBottom pb-1">
                    Pubblica
                </p>
            </a>
        </div>
        <div class="text-center">
            <div class="dropdown px-1">
                <button class="btn p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="#444444"
                        class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    </svg>
                    <p class="text-light m-0 title-navbarBottom pb-1">
                        Tu
                    </p>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="/logout"
                                onclick="event.preventDefault();getElementById('form-logout').submit()">
                                <div class="d-flex  align-items-center border-bottom">
                                    <i class="bi bi-box-arrow-right ps-1 fs-5"></i>
                                    <p class="title-logout m-0">
                                        Logout
                                    </p>
                                </div>
                            </a>
                        </li>
                        <form id="form-logout" action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('POST')
                        </form>
                    </ul>
                </button>
            </div>
        </div>
    @endauth
    @guest
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="43" height="43" fill="#444444"
                class="btn bi bi-person-fill iconaAccountNavBottom text-dark" type="image" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
            </svg>
            <p class="text-light m-0 title-navbarBottom pb-1">
                Accedi
            </p>
        </div>
    @endguest
</div>
<!--END-NAVBAR-BOTTOM-->

<!--CANVAS-CATEGORIE-->
<div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
    aria-labelledby="staticBackdropLabel">
    <div class="offcanvas-header">
        <h3 class="offcanvas-title" id="staticBackdropLabel">Presto.it</h3>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <p class="paragraf-category border-bottom pb-4">
                Tutte le categorie
            </p>
        </div>
        <div>
            <ul class="m-0 p-0 border-bottom pb-4">
                @foreach ($categories as $category)
                    <li class="py-2">
                        <a class="linkOFF" href="{{ route('categoryShow', compact('category')) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <ul class="m-0 p-0 pb-4">
                <li class="pt-4">
                    <a class="linkOFF" href="{{ route('announcement.index') }}">
                        Tutti gli annunci
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--CANVAS-CATEGORIE-->
<!--START CANVAS PER LOGIN E REGISTRAZIONE-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-3">
        <div class="text-center">
            <h4 class="title-login-canvas">
                Login
            </h4>
        </div>
        <div class="tab-content">
            <div class="tab-pane show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    @method('POST')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-outline form-white mb-4 mt-2 pt-3">
                        <label class="form-label" for="typeEmailX">Email</label>
                        <input type="email" name="email" id="typeEmailX"
                            class="form-control form-control-lg input-email-password-canvas" />
                    </div>
                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="typePasswordX">Password</label>
                        <input type="password" name="password" id="typePasswordX"
                            class="form-control form-control-lg input-email-password-canvas" />
                    </div>
                    <button class="gradient-custom btn btn-login-canvas px-5" type="submit">
                        Login
                    </button>
                </form>
            </div>
            <div class="mt-5">
                <p class="text-center">
                    {{ __('ui.non-hai-ancora-account') }}
                </p>
                <a href="{{ route('register') }}">
                    <button class="gradient-custom btn btn-register-canvas px-5 text-light" type="submit">
                        {{ __('ui.registrati') }}
                    </button>
                </a>
            </div>
        </div>
    </div>
    <!--end Se utente non è registrato fai vedere questo form-->
</div>
<!--END CANVAS PER LOGIN E REGISTRAZIONE-->
