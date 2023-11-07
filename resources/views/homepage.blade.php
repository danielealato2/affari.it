<x-layout>

    <x-navTwo />

    <main>
        <!--CAROUSEL-->

        <div id="carouselExampleDark" class="carousel carousel-dark slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div id="oneSlogan">

                </div>
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="/car-home-one.jpeg" class="d-block w-100 imgCarhome" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white fs-1">{{ __('ui.pubblica un articolo che non usi') }} </h5>
                        <p class="text-white fs-4">
                            {{ __('ui.vendi i tuoi Articoli su Affari.it') }}
                        </p>
                    </div>
                </div>
                <div class="carousel-item " data-bs-interval="2000">
                    <img src="/img-carouselTwo.jpeg" class="d-block w-100 imgCarhome" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white fs-1">{{ __('ui.vendi o acquista') }}</h5>
                        <p class="text-white fs-4">{{ __('ui.pubblica un articolo che non usi') }}</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img-carouselTre.jpeg" class="d-block w-100 imgCarhome " alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white fs-1">{{ __('ui.pubblica un articolo che non usi') }}</h5>
                        <p class="text-white fs-4">{{ __('ui.vendi o acquista') }}</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!--CAROUSEL-->



        <!--PULSANTE-TORNA-SU-->
        <span onclick="tornaSu()">
            <div class="btnVaiSu" id="btnSu">
                <i class="bi bi-arrow-up-short fs-3 m-0 p-0 text-center"></i>
                <p class="m-0 paragrafovaiSu text-center">Top</p>
            </div>
        </span>
        <!--PULSANTE-TORNA-SU-->



        <!--ULTIMI 6-->
        <section class="section-one" id="secondoSlogan">
            <div class="container pe-3 ps-3 my-4">
                <div class="row">
                    <h4 class="ps-1 pe-1 titoloCategoriaScript text-center">
                        {{ __('ui.ultimi-sei-annunci') }}
                    </h4>
                </div>
                <div class="row ">
                    @foreach ($announcements as $announcement)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center px-1">
                            <!--CARD-->
                            <a class="linkShow"
                                href="{{ route('announcement.show', ['announcement' => $announcement]) }}">
                                <div class="cardBox my-4">
                                    <img class="img-card-official"
                                        src="{{ !$announcement->images->isEmpty() ? $announcement->images->first()->getUrl(215, 230) : asset('img/default-image.jpg') }}">
                                    <div class="corpoCard pt-4 px-3 pb-1 bg-light">
                                        <p class="prezzoCard">
                                            {{ $announcement->price }} €
                                        </p>
                                        <h5 class="titoloCard mt-3">
                                            {{ $announcement->title }}
                                        </h5>
                                        <h5 class="titoloCard mt-3" id="titoloCategoryCard">
                                            {{ $announcement->category->name }}
                                        </h5>
                                        <h6 class="pubblicatoCard mb-0">
                                            {{ __('ui.pubblicato-da') }} {{ $announcement->user->name ?? '' }} <br>
                                            {{ __('ui.il') }} {{ $announcement->created_at->format('d/m/y') }}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                            <!--CARD-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--ULTIMI 6-->

        <!--TESTO-CHE-SCORRE-->
        <section class="my-5">


            <h4 class="testoCheScorre py-5 text-center px-2">
                {{ __('ui.scopri-i-prodotti-ideali-per-i-tuoi-gusti') }}
            </h4>


        </section>
        <!--TESTO-CHE-SCORRE-->

        <!--CATEGORIE-->
        <section>
            <div class="container my-5">
                <div class="row">
                    <h4 class="ps-1 pe-1 mb-5 titoloCategoriaScript text-center">
                        {{ __('ui.esplora le nostre categorie') }}
                    </h4>
                </div>
                <div class="row my-3">
                    <div class="col-12 col-md-4 d-flex justify-content-center">
                        <a href="http://127.0.0.1:8000/category/1">
                            <div class="d-flex flex-column justify-content-center containerCatRound">
                                <svg style="color:#c44536;" xmlns="http://www.w3.org/2000/svg" width="100"
                                    height="100" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
                                </svg>
                                <p class="text-center titoloCategorieRounded mt-3" style="color:#c44536;">
                                    Motori
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center">
                        <a href="http://127.0.0.1:8000/category/2">
                            <div class="d-flex flex-column justify-content-center containerCatRound">
                                <svg style="color:#0466c8;" xmlns="http://www.w3.org/2000/svg" width="100"
                                    height="100" fill="currentColor" class="bi bi-pc-display" viewBox="0 0 16 16">
                                    <path
                                        d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V1Zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0ZM9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5ZM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5ZM1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2H1.5Z" />
                                </svg>
                                <p class="text-center titoloCategorieRounded mt-3" style="color:#0466c8;">
                                    Informatica
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center">
                        <a href="http://127.0.0.1:8000/category/3">
                            <div class="d-flex flex-column justify-content-center containerCatRound">
                                <svg style="color:#5c8001;" xmlns="http://www.w3.org/2000/svg" width="120"
                                    height="100" fill="currentColor" class="bi bi-tv-fill ps-3"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 13.5A.5.5 0 0 1 3 13h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zM2 2h12s2 0 2 2v6s0 2-2 2H2s-2 0-2-2V4s0-2 2-2z" />
                                </svg>
                                <p class="text-center titoloCategorieRounded mt-3" style="color:#5c8001;">
                                    Elettrodomestici
                                </p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-12 col-md-4 d-flex justify-content-center">
                        <a href="http://127.0.0.1:8000/category/4">
                            <div class="d-flex flex-column justify-content-center containerCatRound">
                                <svg style="color:#fbb02d;" xmlns="http://www.w3.org/2000/svg" width="100"
                                    height="100" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                                </svg>
                                <p class="text-center titoloCategorieRounded mt-3" style="color:#fbb02d;">
                                    Libri
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center">
                        <a href="http://127.0.0.1:8000/category/5">
                            <div class="d-flex flex-column justify-content-center containerCatRound">
                                <svg style="color:#99582a;" xmlns="http://www.w3.org/2000/svg" width="100"
                                    height="100" fill="currentColor" class="bi bi-joystick" viewBox="0 0 16 16">
                                    <path
                                        d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2z" />
                                    <path
                                        d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23z" />
                                </svg>
                                <p class="text-center titoloCategorieRounded mt-3" style="color:#99582a;">
                                    Giochi
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center">
                        <a href="http://127.0.0.1:8000/category/6">
                            <div class="d-flex flex-column justify-content-center containerCatRound">
                                <svg style="color:#62b6cb;" xmlns="http://www.w3.org/2000/svg" width="100"
                                    height="100" fill="currentColor" class="bi bi-bicycle" viewBox="0 0 16 16">
                                    <path
                                        d="M4 4.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1v.5h4.14l.386-1.158A.5.5 0 0 1 11 4h1a.5.5 0 0 1 0 1h-.64l-.311.935.807 1.29a3 3 0 1 1-.848.53l-.508-.812-2.076 3.322A.5.5 0 0 1 8 10.5H5.959a3 3 0 1 1-1.815-3.274L5 5.856V5h-.5a.5.5 0 0 1-.5-.5zm1.5 2.443-.508.814c.5.444.85 1.054.967 1.743h1.139L5.5 6.943zM8 9.057 9.598 6.5H6.402L8 9.057zM4.937 9.5a1.997 1.997 0 0 0-.487-.877l-.548.877h1.035zM3.603 8.092A2 2 0 1 0 4.937 10.5H3a.5.5 0 0 1-.424-.765l1.027-1.643zm7.947.53a2 2 0 1 0 .848-.53l1.026 1.643a.5.5 0 1 1-.848.53L11.55 8.623z" />
                                </svg>
                                <p class="text-center titoloCategorieRounded mt-3" style="color:#62b6cb;">
                                    Sport
                                </p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-12 col-md-4 d-flex justify-content-center">
                        <a href="http://127.0.0.1:8000/category/7">
                            <div class="d-flex flex-column justify-content-center containerCatRound">
                                <svg style="color:#7678ed;" xmlns="http://www.w3.org/2000/svg" width="100"
                                    height="100" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                    <path
                                        d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                </svg>
                                <p class="text-center titoloCategorieRounded mt-3" style="color:#7678ed;">
                                    Immobili
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center">
                        <a href="http://127.0.0.1:8000/category/8">
                            <div class="d-flex flex-column justify-content-center containerCatRound">
                                <svg style="color:#6d6875;" xmlns="http://www.w3.org/2000/svg" width="100"
                                    height="100" fill="currentColor" class="bi bi-phone-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V2zm6 11a1 1 0 1 0-2 0 1 1 0 0 0 2 0z" />
                                </svg>
                                <p class="text-center titoloCategorieRounded mt-3" style="color:#6d6875;">
                                    Telefoni
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center">
                        <a href="http://127.0.0.1:8000/category/9">
                            <div class="d-flex flex-column justify-content-center containerCatRound">
                                <svg style="color:#73ba9b;" xmlns="http://www.w3.org/2000/svg" width="100"
                                    height="100" fill="currentColor" class="bi bi-lamp-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M5.04.303A.5.5 0 0 1 5.5 0h5c.2 0 .38.12.46.303l3 7a.5.5 0 0 1-.363.687h-.002c-.15.03-.3.056-.45.081a32.731 32.731 0 0 1-4.645.425V13.5a.5.5 0 1 1-1 0V8.495a32.753 32.753 0 0 1-4.645-.425c-.15-.025-.3-.05-.45-.08h-.003a.5.5 0 0 1-.362-.688l3-7Z" />
                                    <path
                                        d="M6.493 12.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.052.075l-.001.004-.004.01V14l.002.008a.147.147 0 0 0 .016.033.62.62 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.62.62 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411Z" />
                                </svg>
                                <p class="text-center titoloCategorieRounded mt-3" style="color:#73ba9b;">
                                    Arredamento
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!--CATEGORIE-->


        <!--INFORMATICA-->
        <section>
            <div class="container pe-3 ps-3 my-5 containerInformaticaHome">
                <div class="row">
                    <h4 class="text-center titoloCategoriaScript text-light m-0 pt-3" style="color:#0466c8!important">
                        Informatica
                    </h4>
                </div>
                <div class="row">
                    @foreach ($itOnly as $item)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center px-1">
                            <!--CARD-->
                            <a class="linkShow" href="{{ route('announcement.show', ['announcement' => $item]) }}">
                                <div class="cardBox my-4">
                                    <img class="img-card-official"
                                        src="{{ !$item->images->isEmpty() ? $item->images->first()->getUrl(215, 230) : asset('img/default-image.jpg') }}"
                                        {{-- $announcement->images()->first()->getUrl(400, 300)  per il resize --}}>
                                    <div class="corpoCard pt-4 px-3 pb-1 bg-light">
                                        <p class="prezzoCard" style="color:#0466c8!important">
                                            {{ $item->price }} €
                                        </p>
                                        <h5 class="titoloCard mt-3">
                                            {{ $item->title }}
                                        </h5>
                                        <h6 class="pubblicatoCard mb-0">
                                            {{ __('ui.pubblicato-da') }} {{ $item->user->name ?? '' }} <br>
                                            {{ __('ui.il') }} {{ $item->created_at->format('d/m/y') }}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                            <!--CARD-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--INFORMATICA-->

        <!--MOTORI-->
        <section>
            <div class="container pe-3 ps-3 my-5 containerMotoriHome">
                <div class="row">
                    <h4 class="text-center titoloCategoriaScript text-light m-0 pt-3" style="color:#c44536!important">
                        Motori
                    </h4>
                </div>
                <div class="row ">
                    @foreach ($motorsOnly as $item)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center px-1">
                            <!--CARD-->
                            <a class="linkShow" href="{{ route('announcement.show', ['announcement' => $item]) }}">
                                <div class="cardBox my-4">
                                    <img class="img-card-official"
                                        src="{{ !$item->images->isEmpty() ? $item->images->first()->getUrl(215, 230) : asset('img/default-image.jpg') }}"
                                        {{-- $announcement->images()->first()->getUrl(400, 300)  per il resize --}}>
                                    <div class="corpoCard pt-4 px-3 pb-1 bg-light">
                                        <p class="prezzoCard" style="color:#c44536!important">
                                            {{ $item->price }} €
                                        </p>
                                        <h5 class="titoloCard mt-3">
                                            {{ $item->title }}
                                        </h5>
                                        <h6 class="pubblicatoCard mb-0">
                                            {{ __('ui.pubblicato-da') }} {{ $item->user->name ?? '' }} <br>
                                            {{ __('ui.il') }} {{ $item->created_at->format('d/m/y') }}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                            <!--CARD-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--MOTORI-->

        <!--TELEFONI < 600 EURO-->
        <section>
            <div class="container pe-3 ps-3 my-5 containerSmartphoneHome">
                <div class="row">
                    <h4 class="text-center titoloCategoriaScript text-light m-0 pt-3" style="color:#6d6875!important">
                        {{ __('ui.smartphone a minor prezzo') }}
                    </h4>
                </div>
                <div class="row ">
                    @foreach ($smartphoneMinors as $item)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center px-1">
                            <!--CARD-->
                            <a class="linkShow" href="{{ route('announcement.show', ['announcement' => $item]) }}">
                                <div class="cardBox my-4">
                                    <img class="img-card-official"
                                        src="{{ !$item->images->isEmpty() ? $item->images->first()->getUrl(215, 230) : asset('img/default-image.jpg') }}"
                                        {{-- $announcement->images()->first()->getUrl(400, 300)  per il resize --}}>
                                    <div class="corpoCard pt-4 px-3 pb-1 bg-light">
                                        <p class="prezzoCard" style="color:#6d6875!important">
                                            {{ $item->price }} €
                                        </p>
                                        <h5 class="titoloCard mt-3">
                                            {{ $item->title }}
                                        </h5>
                                        <h6 class="pubblicatoCard mb-0">
                                            {{ __('ui.pubblicato-da') }} {{ $item->user->name ?? '' }} <br>
                                            {{ __('ui.il') }} {{ $item->created_at->format('d/m/y') }}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                            <!--CARD-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--TELEFONI < 600 EURO-->



        <!--PREZZI BASSI-->
        <section class="bg-dark py-5">
            <div class="container pe-3 ps-3 my-5 containerSmartphoneHome">
                <div class="row">
                    <!--TESTO-CHE-SCORRE-->
                    <section class="my-3">


                        <h4 class="testoCheScorre py-5 text-center px-2">
                            {{ __('ui.annunci-a-prezzi-bassi-scopri-di-più') }}
                        </h4>


                    </section>
                    <!--TESTO-CHE-SCORRE-->
                </div>
                <div class="row ">
                    @foreach ($minors as $item)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center px-1">
                            <!--CARD-->
                            <a class="linkShow" href="{{ route('announcement.show', ['announcement' => $item]) }}">
                                <div class="cardBox my-4">
                                    <img class="img-card-official"
                                        src="{{ !$item->images->isEmpty() ? $item->images->first()->getUrl(215, 230) : asset('img/default-image.jpg') }}"
                                        {{-- $announcement->images()->first()->getUrl(400, 300)  per il resize --}}>
                                    <div class="corpoCard pt-4 px-3 pb-1 bg-light">
                                        <p class="prezzoCard" style="color:black!important">
                                            {{ $item->price }} €
                                        </p>
                                        <h5 class="titoloCard mt-3">
                                            {{ $item->title }}
                                        </h5>
                                        <h5 class="titoloCard mt-3" id="titoloCategoryCard">
                                            {{ $item->category->name }}
                                        </h5>
                                        <h6 class="pubblicatoCard mb-0">
                                            {{ __('ui.pubblicato-da') }} {{ $item->user->name ?? '' }} <br>
                                            {{ __('ui.il') }} {{ $item->created_at->format('d/m/y') }}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                            <!--CARD-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--PREZZI BASSI-->

        <!--ELETTRODOMESICI-->
        <section>
            <div class="container pe-3 ps-3 my-5 containerElettrodomesticiHome">
                <div class="row">
                    <h4 class="text-center titoloCategoriaScript text-light m-0 pt-3" style="color:#5c8001!important">
                        Elettrodomestici
                    </h4>
                </div>
                <div class="row ">
                    @foreach ($elettrodomestici as $item)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center px-1">
                            <!--CARD-->
                            <a class="linkShow" href="{{ route('announcement.show', ['announcement' => $item]) }}">
                                <div class="cardBox my-4">
                                    <img class="img-card-official"
                                        src="{{ !$item->images->isEmpty() ? $item->images->first()->getUrl(215, 230) : asset('img/default-image.jpg') }}"
                                        {{-- $announcement->images()->first()->getUrl(400, 300)  per il resize --}}>
                                    <div class="corpoCard pt-4 px-3 pb-1 bg-light">
                                        <p class="prezzoCard" style="color:#5c8001!important">
                                            {{ $item->price }} €
                                        </p>
                                        <h5 class="titoloCard mt-3">
                                            {{ $item->title }}
                                        </h5>
                                        <h6 class="pubblicatoCard mb-0">
                                            {{ __('ui.pubblicato-da') }}{{ $item->user->name ?? '' }} <br>
                                            {{ __('ui.il') }} {{ $item->created_at->format('d/m/y') }}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                            <!--CARD-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--ELETTRODOMESICI-->

        <!--IMMOBILI-->
        <section>
            <div class="container pe-3 ps-3 my-5 containerImmobiliHome">
                <div class="row">
                    <h4 class="text-center titoloCategoriaScript text-light m-0 pt-3" style="color:#7678ed!important">
                        Immobili
                    </h4>
                </div>
                <div class="row">
                    @foreach ($immobili as $item)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center px-1">
                            <!--CARD-->
                            <a class="linkShow" href="{{ route('announcement.show', ['announcement' => $item]) }}">
                                <div class="cardBox my-4">
                                    <img class="img-card-official"
                                        src="{{ !$item->images->isEmpty() ? $item->images->first()->getUrl(215, 230) : asset('img/default-image.jpg') }}"
                                        {{-- $announcement->images()->first()->getUrl(400, 300)  per il resize --}}>
                                    <div class="corpoCard pt-4 px-3 pb-1 bg-light">
                                        <p class="prezzoCard" style="color:#7678ed!important">
                                            {{ $item->price }} €
                                        </p>
                                        <h5 class="titoloCard mt-3">
                                            {{ $item->title }}
                                        </h5>
                                        <h6 class="pubblicatoCard mb-0">
                                            {{ __('ui.pubblicato-da') }} {{ $item->user->name ?? '' }} <br>
                                            {{ __('ui.il') }} {{ $item->created_at->format('d/m/y') }}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                            <!--CARD-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--IMMOBILI-->




        <!--LIBRI-->
        <section>
            <div class="container pe-3 ps-3 my-5 containerLibriHome">
                <div class="row">
                    <h4 class="text-center titoloCategoriaScript text-light m-0 pt-3" style="color:#fbb02d!important">
                        Libri
                    </h4>
                </div>
                <div class="row">
                    @foreach ($libri as $item)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center px-1">
                            <!--CARD-->
                            <a class="linkShow" href="{{ route('announcement.show', ['announcement' => $item]) }}">
                                <div class="cardBox my-4">
                                    <img class="img-card-official"
                                        src="{{ !$item->images->isEmpty() ? $item->images->first()->getUrl(215, 230) : asset('img/default-image.jpg') }}"
                                        {{-- $announcement->images()->first()->getUrl(400, 300)  per il resize --}}>
                                    <div class="corpoCard pt-4 px-3 pb-1 bg-light">
                                        <p class="prezzoCard" style="color:#fbb02d!important">
                                            {{ $item->price }} €
                                        </p>
                                        <h5 class="titoloCard mt-3">
                                            {{ $item->title }}
                                        </h5>
                                        <h6 class="pubblicatoCard mb-0">
                                            {{ __('ui.pubblicato-da') }} {{ $item->user->name ?? '' }} <br>
                                            {{ __('ui.il') }} {{ $item->created_at->format('d/m/y') }}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                            <!--CARD-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--LIBRI-->

        <!--LAVORA CON NOI-->
        <section>
            <div class="container my-5">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-secondary py-5" role="alert">
                            <div>
                                <h4 class="text-center titoloCategoriaScript text-light m-0 pt-3"
                                    style="color:#444444!important">
                                    {{ __('ui.lavora con noi') }}
                                </h4>
                                <p class="text-center text-dark mt-5 fs-5">
                                    {{ __('ui.diventa revisore basta registrarti') }}<br>
                                    {{ __('ui.scopri come') }}
                                </p>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('register') }}">
                                        <button
                                            class="gradient-custom btn btn-register-aler px-5 text-light pulsante-home-alert"
                                            type="submit">
                                            {{ __('ui.registrati') }}
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!--LAVORA CON NOI-->

        <!--ARREDAMENTO-->
        <section>
            <div class="container pe-3 ps-3 my-5 containerArredamentoHome">
                <div class="row">
                    <h4 class="text-center titoloCategoriaScript text-light m-0 pt-3" style="color:#73ba9b!important">
                        Arredamento
                    </h4>
                </div>
                <div class="row">
                    @foreach ($arredamento as $item)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center px-1">
                            <!--CARD-->
                            <a class="linkShow" href="{{ route('announcement.show', ['announcement' => $item]) }}">
                                <div class="cardBox my-4">
                                    <img class="img-card-official"
                                        src="{{ !$item->images->isEmpty() ? $item->images->first()->getUrl(215, 230) : asset('img/default-image.jpg') }}"
                                        {{-- $announcement->images()->first()->getUrl(400, 300)  per il resize --}}>
                                    <div class="corpoCard pt-4 px-3 pb-1 bg-light">
                                        <p class="prezzoCard" style="color:#73ba9b!important">
                                            {{ $item->price }} €
                                        </p>
                                        <h5 class="titoloCard mt-3">
                                            {{ $item->title }}
                                        </h5>
                                        <h6 class="pubblicatoCard mb-0">
                                            {{ __('ui.pubblicato-da') }} {{ $item->user->name ?? '' }} <br>
                                            {{ __('ui.il') }} {{ $item->created_at->format('d/m/y') }}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                            <!--CARD-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--ARREDAMENTO-->

        <!--TESTO-CHE-SCORRE-->
        <section class="my-5">


            <h4 class="testoCheScorre py-5 text-center px-2">
                {{ __('ui.iscriviti-in-piattaforma-ed-inizia-a-monetizzare') }}
            </h4>


        </section>
        <!--TESTO-CHE-SCORRE-->

        <!--SPORT-->
        <section>
            <div class="container pe-3 ps-3 my-5 containerArredamentoHome">
                <div class="row">
                    <h4 class="text-center titoloCategoriaScript text-light m-0 pt-3" style="color:#62b6cb!important">
                        Sport
                    </h4>
                </div>
                <div class="row">
                    @foreach ($sports as $item)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center px-1">
                            <!--CARD-->
                            <a class="linkShow" href="{{ route('announcement.show', ['announcement' => $item]) }}">
                                <div class="cardBox my-4">
                                    <img class="img-card-official"
                                        src="{{ !$item->images->isEmpty() ? $item->images->first()->getUrl(215, 230) : asset('img/default-image.jpg') }}"
                                        {{-- $announcement->images()->first()->getUrl(400, 300)  per il resize --}}>
                                    <div class="corpoCard pt-4 px-3 pb-1 bg-light">
                                        <p class="prezzoCard" style="color:#62b6cb!important">
                                            {{ $item->price }} €
                                        </p>
                                        <h5 class="titoloCard mt-3">
                                            {{ $item->title }}
                                        </h5>
                                        <h6 class="pubblicatoCard mb-0">
                                            {{ __('ui.pubblicato-da') }} {{ $item->user->name ?? '' }} <br>
                                            {{ __('ui.il') }} {{ $item->created_at->format('d/m/y') }}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                            <!--CARD-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--SPORT-->

        <!--GIOCHI-->
        <section>
            <div class="container pe-3 ps-3 my-5 containerArredamentoHome">
                <div class="row">
                    <h4 class="text-center titoloCategoriaScript text-light m-0 pt-3" style="color:#99582a!important">
                        Giochi
                    </h4>
                </div>
                <div class="row">
                    @foreach ($giochi as $item)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center px-2">
                            <!--CARD-->
                            <a class="linkShow" href="{{ route('announcement.show', ['announcement' => $item]) }}">
                                <div class="cardBox my-4">
                                    <img class="img-card-official"
                                        src="{{ !$item->images->isEmpty() ? $item->images->first()->getUrl(215, 230) : asset('img/default-image.jpg') }}"
                                        {{-- $announcement->images()->first()->getUrl(400, 300)  per il resize --}}>
                                    <div class="corpoCard pt-4 px-3 pb-1 bg-light">
                                        <p class="prezzoCard" style="color:#99582a!important">
                                            {{ $item->price }} €
                                        </p>
                                        <h5 class="titoloCard mt-3">
                                            {{ $item->title }}
                                        </h5>
                                        <h6 class="pubblicatoCard mb-0">
                                            {{ __('ui.pubblicato-da') }} {{ $item->user->name ?? '' }} <br>
                                            {{ __('ui.il') }} {{ $item->created_at->format('d/m/y') }}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                            <!--CARD-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--GIOCHI-->


    </main>
    <x-footer />
    <script>
        //questo script cambia la navbar da trasparente a colorata

        window.addEventListener('scroll', (event) => {

            let scrollTop = document.documentElement.scrollTop;
            let secondoSloganDiv = document.getElementById("oneSlogan");

            let nav = document.getElementById("nav");


            let topSecondoSloganDiv = secondoSloganDiv.offsetTop;


            if (scrollTop > topSecondoSloganDiv) {

                nav.style.backgroundColor = "#f5f5f5";
                nav.style.transition = "background-color 1s";
                nav.style.borderBottom = "0.1px solid #d2d2d2";
                nav.style.boxShadow =
                    "rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;";
            } else {
                nav.style.backgroundColor = "transparent";
                nav.style.borderBottom = "none";
            }
        });

        window.addEventListener('scroll', (event) => {

            let scrollTop = document.documentElement.scrollTop;
            let secondoSloganDiv = document.getElementById("secondoSlogan");

            let btn = document.getElementById("btnSu");


            let topSecondoSloganDiv = secondoSloganDiv.offsetTop;


            if (scrollTop > topSecondoSloganDiv) {

                btn.style.display = "block";
                nav.style.transition = "1s";

            } else {
                btn.style.display = "none";
            }
        });

        //torna su
        function tornaSu() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
</x-layout>
