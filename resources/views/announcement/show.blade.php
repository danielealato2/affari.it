<x-layout>
    <x-navTre />
    <main id="generalMain">

        <!--TITOLO CATEGORIA-->
        <div class="container my-5 contenitoreShow">
            <div class="row">
                <div class="col-12">
                    <h3 class="titoloCategoriaScript m-0 coloreCambiaShow border-bottom" id="titoloShow">
                        {{ $announcement->category->name }}
                    </h3>
                </div>
            </div>
        </div>
        <!--TITOLO CATEGORIA-->

        <!--QUESTO CONTENITORE SI VEDE SOLO CON SCHERMO < 768-->
        <div class="container mt-5 mb-1 containerPiccoleRow">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">

                    @foreach ($announcement->images as $image)
                        <div id="immaginiPiccole" class="mx-1">
                            <img onmouseover="cambiaImmagine(this.src)" class="img-piccole-show"
                                src="{{ $image->getUrl(400, 300) }}" alt="{{ asset('img/default-image.jpg') }}">

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!--QUESTO CONTENITORE SI VEDE SOLO CON SCHERMO < 768-->

        <!--CONTENITORE PRINCIPALE-->
        <div class="container mb-5" id="secondoSlogan">
            <div class="row">
                <div class="col-12 col-md-2 d-flex justify-content-end my-2">

                    <div class="d-flex flex-column containerPiccole wolf">
                        @foreach ($announcement->images as $image)
                            <div id="immaginiPiccole " class="mb-1">
                                <img onmouseover="cambiaImmagine(this.src)" class="img-piccole-show"
                                    src="{{ $image->getUrl(400, 300) }}" alt="{{ asset('img/default-image.jpg') }}">
                            </div>
                        @endforeach
                    </div>
                </div>



                <div class="col-12 col-md-7 justify-content-center my-2">
                    <div id="generalContainerImgShow">
                        <img id="immagineGrande" class="img-show img-fluid"
                            src="{{ !$announcement->images->isEmpty() ? $announcement->images->first()->getUrl(740, 560) : asset('img/default-image.jpg') }}"
                            alt="" id="container-img-small">
                    </div>
                </div>

                <div class="col-12 col-md-3 d-flex justify-content-center my-2">
                    <div class="">
                        <div>
                            <h2 class="title-show coloreCambiaShow">
                                {{ $announcement->title }}
                            </h2>
                        </div>
                        <div class="mt-4">
                            <h3 class="price-show  pb-3 coloreCambiaShow">
                                {{ $announcement->price }} € {{ __('ui.iva-inclusa') }}
                            </h3>
                        </div>
                        <div class="mt-4  mb-4">
                            <p class="pb-3">
                                {{ $announcement->description }}
                            </p>
                        </div>
                        <div class="mt-5">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="title-user-card m-0">
                                        {{ __('ui.pubblicato-da') }} {{ $announcement->user->name ?? '' }} <br>
                                        {{ __('ui.il') }} {{ $announcement->created_at->format('d/m/y') }}
                                    </h6>
                                </div>
                            </div>
                            <div class="mt-5 mb-5 pb-4">
                                <h6 class="title-user-card m-0">
                                    {{ __('ui.contatta') }} {{ $announcement->user->name ?? '' }}
                                </h6>
                                <i class="bi bi-envelope-at-fill fs-5"></i>
                                <a target="blank" class="mb-5 ps-1"
                                    href="mailto:{{ $announcement->user->email ?? '' }}">{{ $announcement->user->email ?? '' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--CONTENITORE PRINCIPALE-->


        <!--PULSANTE-TORNA-SU-->
        <span onclick="tornaSu()">
            <div class="btnVaiSu" id="btnSu">
                <i class="bi bi-arrow-up-short fs-3 m-0 p-0 text-center"></i>
                <p class="m-0 paragrafovaiSu text-center">Top</p>
            </div>
        </span>
        <!--PULSANTE-TORNA-SU-->


        <!--PRODOTTI CORRELATI-->
        <section>
            <div class="container my-5 border-top">
                <div class="row">
                    <h5 class="title-prodotti-correlati ps-0 m-0 pt-5 pb-4 text-center">
                        {{ __('ui.scopri-prodotti-correlati') }}
                    </h5>
                </div>
                <div class="row">
                    @foreach ($consigliati->where('is_accepted', true) as $consigliato)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center px-1">
                            <!--CARD-->
                            <a class="linkShow"
                                href="{{ route('announcement.show', ['announcement' => $consigliato]) }}">
                                <div class="cardBox my-4">
                                    <img class="img-card-official"
                                        src="{{ !$consigliato->images->isEmpty() ? $consigliato->images->first()->getUrl(215, 230) : asset('img/default-image.jpg') }}"
                                        {{-- $announcement->images()->first()->getUrl(400, 300)  per il resize --}}>
                                    <div class="corpoCard pt-4 px-3 pb-1 bg-light">
                                        <p class="prezzoCard">
                                            {{ $consigliato->price }} €
                                        </p>
                                        <h5 class="titoloCard mt-3">
                                            {{ $consigliato->title }}
                                        </h5>
                                        <h5 class="titoloCard mt-3">
                                            {{ $consigliato->category->name }}
                                        </h5>
                                        <h6 class="pubblicatoCard mb-0">
                                            Pubblicato da {{ $consigliato->user->name ?? '' }} <br>
                                            Il {{ $consigliato->created_at->format('d/m/y') }}
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
        <!--PRODOTTI CORRELATI-->


        <!--PRODOTTI MINORI DI 50€-->
        <section>
            <div class="container-fluid my-5 bg-dark">
                <div class="row">
                    <!--TESTO-CHE-SCORRE-->
                    <section class="my-2">

                        <h4 class="testoCheScorre py-5 text-center">
                            {{ __('ui.annunci-a-prezzi-bassi-scopri-di-più') }}
                        </h4>

                    </section>
                    <!--TESTO-CHE-SCORRE-->
                </div>
                <div class="row">
                    @foreach ($ineferioridicianquanta->where('is_accepted', true) as $item)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center px-1">
                            <!--CARD-->
                            <a class="linkShow" href="{{ route('announcement.show', ['announcement' => $item]) }}">
                                <div class="cardBox my-4">
                                    <img class="img-card-official"
                                        src="{{ !$item->images->isEmpty() ? $item->images->first()->getUrl(215, 230) : asset('img/default-image.jpg') }}"
                                        {{-- $announcement->images()->first()->getUrl(400, 300)  per il resize --}}>
                                    <div class="corpoCard pt-4 px-3 pb-1 bg-light">
                                        <p class="prezzoCard">
                                            {{ $item->price }} €
                                        </p>
                                        <h5 class="titoloCard mt-3">
                                            {{ $item->title }}
                                        </h5>
                                        <h5 class="titoloCard mt-3" id="titoloCategoryCard">
                                            {{ $item->category->name }}
                                        </h5>
                                        <h6 class="pubblicatoCard mb-0">
                                            Pubblicato da {{ $item->user->name ?? '' }} <br>
                                            Il {{ $item->created_at->format('d/m/y') }}
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
        <!--PRODOTTI MINORI DI 50€-->



        <!-- <section>
            <div class="container-fluid my-5">
                <div class="row">
                    <div class="col-12 col-md-2 d-flex justify-content-center mb-5">
                        <div class="d-flex flex-column">
                            <div class="container-stiky">
                                <div class="pippo pt-4">
                                    <div class="mb-2">
                                        <img class="img-piccole-show"
                                            src="{{ !$announcement->images()->get()->isEmpty()? Storage::url($announcement->images()->first()->path): '\img\default-image.jpg' }}"
                                            alt="" onmouseover="cambiaOne()">
                                    </div>
                                    <div class="my-2">
                                        <img class="img-piccole-show"
                                            src="{{ !$announcement->images()->get()->isEmpty()? Storage::url($announcement->images()->first()->path): '\img\default-image.jpg' }}"
                                            alt="" onmouseover="cambiaTwo()">
                                    </div>
                                    <div class="my-2">
                                        <img class="img-piccole-show"
                                            src="{{ !$announcement->images()->get()->isEmpty()? Storage::url($announcement->images()->first()->path): '\img\default-image.jpg' }}"
                                            alt="" onmouseover="cambiaThree()">
                                    </div>
                                    <div class="mt-2">
                                        <img class="img-piccole-show"
                                            src="{{ !$announcement->images()->get()->isEmpty()? Storage::url($announcement->images()->first()->path): '\img\default-image.jpg' }}"
                                            alt="" onmouseover="cambiaFour()">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 justify-content-center px-0">
                        <div class="container-stiky">
                            <div id="generalContainerImgShow" class="cic">
                                <img class="img-show img-fluid px-2"
                                    src="{{ !$announcement->images->isEmpty() ? $announcement->images->first()->getUrl(400, 300) : asset('img/default-image.jpg') }}"
                                    alt="" id="container-img-small" onclick="openPanelShowxxxl()">
                            </div>
                            <div class="text-center mt-3">
                                <p>
                                    {{ __('ui.clicca-per-visualizzare-tutto.schermo') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 px-5">
                        <div class="">
                            <div>
                                <h2 class="title-show">
                                    {{ $announcement->title }}
                                </h2>
                            </div>
                            <div class="mt-4">
                                <h3 class="price-show border-bottom pb-3">
                                    {{ $announcement->price }} € {{ __('ui.iva-inclusa') }}
                                </h3>
                            </div>
                            <div class="mt-4 border-bottom  mb-4">
                                <p class="pb-3">
                                    {{ $announcement->description }}
                                </p>
                            </div>
                            <div class="mt-5">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <img class="img-pubblicataDa" src="/img/img-pubblicatada.jpeg" alt="">
                                    </div>
                                    <div class="ps-2">
                                        <h6 class="title-user-card m-0">
                                            {{ __('ui.pubblicato-da') }} {{ $announcement->user->name ?? '' }} <br>
                                            {{ __('ui.il') }} {{ $announcement->created_at->format('d/m/y') }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="mt-5 mb-5 border-bottom pb-4">
                                    <h6 class="title-user-card m-0">
                                        {{ __('ui.contatta') }} {{ $announcement->user->name ?? '' }}
                                    </h6>
                                    <i class="bi bi-envelope-at-fill fs-5"></i>
                                    <a target="blank" class="mb-5 ps-1"
                                        href="mailto:{{ $announcement->user->email ?? '' }}">{{ $announcement->user->email ?? '' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!--MAIN-->



        <!--START CONTAINER - CLICK IMG-SMALL-XXXL-->
        <section class="d-flex justify-content-center">
            <div class="container-fluid container-show-xxxl bg-white panel-show-xxxl" id="panelXXXL">
                <div class="row border-bottom">
                    <div class="col-12 px-4">
                        <div class="d-flex justify-content-between">
                            <div class="py-3 ps-3">
                                <h4 class="m-0">
                                    {{ $announcement->title }}
                                </h4>
                            </div>
                            <div class="py-3 pe-1">
                                <span>
                                    <i class="bi bi-x-lg fs-4 icon-close-container-xxxl"
                                        onclick="closePanelShowxxxl()"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-12 col-md-9 pe-0">
                        <div>
                            <img id="immagineGrande2" class="img-show-small-xxxl pe-0 py-4"
                                src="{{ !$announcement->images->isEmpty() ? $announcement->images->first()->getUrl(740, 560) : asset('img/default-image.jpg') }}"
                                alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-3 pt-4">
                        <div class="d-flex justify-content-center px-1">
                            <div class="px-1">
                                @foreach ($announcement->images as $image)
                                    <div id="immaginiPiccole">
                                        <img onmouseover="cambiaImmagine2(this.src)" class="img-piccole-show"
                                            src="{{ $image->getUrl(80, 120) }}"
                                            alt="{{ asset('img/default-image.jpg') }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--END CLICK CONTAINER - IMG-SMALL-XXXL-->

        <!--START PANNELLO DELLE ACCESSIBILITA-->
        <!-- <div class="container-usabilità">
            <img class="iconAc" src="/icons8-accessibilità-2-50.png" onclick="openAccessibilita()" alt="">
        </div>
        <div class="container-accessibilità border" id="panelAcess">
            <div>
                <div class="d-flex justify-content-end mt-2 me-2">
                    <div>
                        <i class="bi bi-x-lg fs-5" class="closeIcon" onclick="closePanelAcess()"></i>
                    </div>
                </div>
                <div class="text-center">
                    <h5 class="m-0 mb-3">
                        Gestisci i tuoi gusti
                    </h5>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <div class="mx-1">
                    <button class="btn-dark-light" onclick="darkColor()">
                        <i class="bi bi-moon fs-5 paragraf-icon-dark-light"></i> <br>
                        <p class="m-0">
                            dark-zone
                        </p>
                    </button>
                </div>
                <div class="mx-1">
                    <button class="btn-dark-light" onclick="lightColor()">
                        <i class="bi bi-sun fs-5"></i> <br>
                        <p class="m-0 paragraf-icon-dark-light">
                            light-zone
                        </p>
                    </button>
                </div>
            </div>
        </div> -->
        <!--END PANNELLO DELLE ACCESSIBILITA-->
    </main>
    <!--END CLICK IMG-SMALL-XXXL-->
    {{-- <div class="container">
        <div class="row">
            <div class="text-center">
                <h1>Titolo - {{ $announcement->title }}</h1>
    <h3>Descrizione - {{ $announcement->description }}</h3>
    <h3>€ {{ $announcement->price }}</h3>
    <h3>{{ $announcement->categoy }}</p>
        <h3>Pubblicato il : {{ $announcement->created_at->format('d/m/y') }}</h3>
        </div>
        </div>
        </div> --}}
    <section class="my-2">
        <h4 class="testoCheScorre py-5  text-center">
            {{ __('ui.iscriviti-sulla-nostra-piattaforma') }}
        </h4>
        <div class="d-flex justify-content-center mb-5">
            <a href="{{ route('register') }}">
                <button class="gradient-custom btn btn-register-aler px-5 mb-5 text-light pulsante-home-alert"
                    type="submit">
                    {{ __('ui.registrati') }}
                </button>
            </a>
        </div>
    </section>
    <x-footer />
    <!--SCRIPT PER CLICK CAMBIA IMG + ZOOM-->
    <script>
        function cambiaOne() {

            document.getElementById("container-img-small").src =
                "{{ !$announcement->images()->get()->isEmpty()? Storage::url($announcement->images()->first()->path): '\img\default-image.jpg' }}";
        }

        function cambiaTwo() {
            document.getElementById("container-img-small").src =
                "{{ !$announcement->images()->get()->isEmpty()? Storage::url($announcement->images()->first()->path): '\img\default-image.jpg' }}";
        }

        function cambiaThree() {
            document.getElementById("container-img-small").src =
                "{{ !$announcement->images()->get()->isEmpty()? Storage::url($announcement->images()->first()->path): '\img\default-image.jpg' }}";
        }

        function cambiaFour() {
            document.getElementById("container-img-small").src =
                "{{ !$announcement->images()->get()->isEmpty()? Storage::url($announcement->images()->first()->path): '\img\default-image.jpg' }}";
        }



        //ARPI PANEL SHOW-XXXL
        function openPanelShowxxxl() {
            let open = document.getElementById("panelXXXL");
            let opacityBackgroun = document.getElementById("generalMain");
            open.style.display = "block";
        }

        function closePanelShowxxxl() {
            let close = document.getElementById("panelXXXL");
            let opacityBackgroun = document.getElementById("generalMain");
            close.style.display = "none";
        }
        //CAMBIA IMG AL CLIK N.B. PANEL-SHOW-XXXL
        function cambiaUno() {

            document.getElementById("container-img-xxxl").src =
                "{{ !$announcement->images()->get()->isEmpty()? Storage::url($announcement->images()->first()->path): '\img\default-image.jpg' }}";
        }

        function cambiaDue() {
            document.getElementById("container-img-xxxl").src =
                "{{ !$announcement->images()->get()->isEmpty()? Storage::url($announcement->images()->first()->path): '\img\default-image.jpg' }}";
        }

        function cambiaTre() {
            document.getElementById("container-img-xxxl").src =
                "{{ !$announcement->images()->get()->isEmpty()? Storage::url($announcement->images()->first()->path): '\img\default-image.jpg' }}";
        }

        function cambiaQuattro() {
            document.getElementById("container-img-xxxl").src =
                "{{ !$announcement->images()->get()->isEmpty()? Storage::url($announcement->images()->first()->path): '\img\default-image.jpg' }}";
        }

        //PANNELLO ACCESSIBILITA
        function openAccessibilita() {
            let x = document.getElementById("panelAcess");

            x.style.display = "block";
        }

        function closePanelAcess() {
            let y = document.getElementById("panelAcess");

            y.style.display = "none";
        }

        function darkColor() {
            let t = document.getElementsByClassName("darkLight");
            let p = document.getElementsByClassName("lightZone");

            for (let i = 0; i < t.length; i++) {
                t[i].style.backgroundColor = "#212529";
                t[i].style.transition = "0.5s";
            }


            for (let i = 0; i < p.length; i++) {
                p[i].style.color = "#f5f5f5";
                p[i].style.transition = "0.5s";
            }

        }

        function lightColor() {
            let z = document.getElementsByClassName("darkLight");
            let o = document.getElementsByClassName("lightZone");

            for (let i = 0; i < z.length; i++) {
                z[i].style.backgroundColor = "#f5f5f5";
                z[i].style.transition = "0.5s";
            }


            for (let i = 0; i < o.length; i++) {
                o[i].style.color = "#212529";
                o[i].style.transition = "0.5s";
            }

        }



        //questa funzione mi fa colorare le categorie
        var value = document.getElementById("titoloShow").innerText;
        var out = document.getElementsByClassName("coloreCambiaShow");

        if (value === "Informatica") {
            for (let i = 0; i < out.length; i++) {
                out[i].style.color = "#0466c8";
            }
        } else if (value === "Motori") {
            for (let i = 0; i < out.length; i++) {
                out[i].style.color = "#c44536";
            }
        } else if (value === "Elettrodomestici") {
            for (let i = 0; i < out.length; i++) {
                out[i].style.color = "#5c8001";
            }
        } else if (value === "Libri") {
            for (let i = 0; i < out.length; i++) {
                out[i].style.color = "#fbb02d";
            }
        } else if (value === "Giochi") {
            for (let i = 0; i < out.length; i++) {
                out[i].style.color = "#99582a";
            }
        } else if (value === "Sport") {
            for (let i = 0; i < out.length; i++) {
                out[i].style.color = "#62b6cb";
            }
        } else if (value === "Immobili") {
            for (let i = 0; i < out.length; i++) {
                out[i].style.color = "#7678ed";
            }
        } else if (value === "Telefoni") {
            for (let i = 0; i < out.length; i++) {
                out[i].style.color = "#6d6875";
            }
        } else if (value === "Arredamento") {
            for (let i = 0; i < out.length; i++) {
                out[i].style.color = "#73ba9b";
            }
        }

        function cambiaColore(titolo, colore) {
            //altro cambio colore
            let valueDue = document.getElementById("titoloCategoryCard").innerText;
            let outDue = document.getElementsByClassName(colore);

            if (valueDue === "Informatica") {
                for (let i = 0; i < outDue.length; i++) {
                    outDue[i].style.color = "#0466c8";
                }
            } else if (valueDue === "Motori") {
                for (let i = 0; i < outDue.length; i++) {
                    outDue[i].style.color = "#c44536";
                }
            } else if (valueDue === "Elettrodomestici") {
                for (let i = 0; i < outDue.length; i++) {
                    outDue[i].style.color = "#5c8001";
                }
            } else if (valueDue === "Libri") {
                for (let i = 0; i < outDue.length; i++) {
                    outDue[i].style.color = "#fbb02d";
                }
            } else if (valueDue === "Giochi") {
                for (let i = 0; i < outDue.length; i++) {
                    outDue[i].style.color = "#99582a";
                }
            } else if (valueDue === "Sport") {
                for (let i = 0; i < outDue.length; i++) {
                    outDue[i].style.color = "#62b6cb";
                }
            } else if (valueDue === "Immobili") {
                for (let i = 0; i < outDue.length; i++) {
                    outDue[i].style.color = "#7678ed";
                }
            } else if (valueDue === "Telefoni") {
                for (let i = 0; i < outDue.length; i++) {
                    outDue[i].style.color = "#6d6875";
                }
            } else if (valueDue === "Arredamento") {
                for (let i = 0; i < outDue.length; i++) {
                    outDue[i].style.color = "#73ba9b";
                }
            }
        }


        //torna su
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

        function cambiaImmagine(nuovaImmagineSrc) {
            var immagineGrande = document.getElementById('immagineGrande');
            immagineGrande.src = nuovaImmagineSrc;
        }

        function cambiaImmagine2(nuovaImmagineSrc2) {
            var immagineGrande2 = document.getElementById('immagineGrande2');
            immagineGrande2.src = nuovaImmagineSrc2;
        }
    </script>
    <!--SCRIPT PER CLICK CAMBIA IMG + ZOOM-->
</x-layout>
