<x-layout>
    <x-navTre />
    <main class="darkLight">

        <!-- <a class="btn btn-outline-primary btn-inserisci-annuncio mt-5 mb-3 fs-5" href="{{ URL::previous() }}">
            <i class="bi bi-caret-left"> </i>
            Back
        </a> -->
        <div id="primoSloganDiv" style="height: 30px;" class="mt-4">

        </div>
    
        <div class="mt-5 container-titolo-categorie" id="titoloSposta">
            <h3 class="titoloCategoriaScript m-0 ms-2 coloreCambia pb-3 pt-2" id="titolo">
                {{ $category->name }}
            </h3>
        </div>

        <section class="sectionCategoryIndex" id="secondoSlogan">
            <div class="container pe-3 ps-3 my-4">
                <div class="row">
                    @foreach ($announcements as $announcement)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center px-1">
                            <!--CARD-->
                            <a class="linkShow"
                                href="{{ route('announcement.show', ['announcement' => $announcement]) }}">
                                <div class="cardBox my-4">
                                    <img class="img-card-official"
                                        src="{{ !$announcement->images->isEmpty() ? $announcement->images->first()->getUrl(215, 230) : asset('img/default-image.jpg') }}"
                                        {{-- $announcement->images()->first()->getUrl(400, 300)  per il resize --}}>
                                    <div class="corpo pt-4 px-3 pb-1 bg-light">
                                        <h4 class="prezzoCard coloreCambia">
                                            {{ $announcement->price }} €
                                        </h4>
                                        <h5 class="titoloCard mt-3">
                                            {{ $announcement->title }}
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


        <!--PULSANTE-TORNA-SU-->
        <span onclick="tornaSu()">
            <div class="btnVaiSu" id="btnSu">
                <i class="bi bi-arrow-up-short fs-3 m-0 p-0 text-center"></i>
                <p class="m-0 paragrafovaiSu text-center">Top</p>
            </div>
        </span>
        <!--PULSANTE-TORNA-SU-->


        <!--START PANNELLO DELLE ACCESSIBILITA-->

        <!-- <div class="container-usabilità">
           <i class="bi bi-person-arms-up fs-2" onclick="openAccessibilita()"></i>
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
                
                    <button class="btn-dark-light" onclick="darkColor()">
                        <i class="bi bi-moon fs-5 paragraf-icon-dark-light"></i> <br>
                        <p class="m-0 paragraf-icon-dark-light">
                            dark-zone
                        </p>
                    </button>
                
               
                    <button class="btn-dark-light" onclick="lightColor()">
                        <i class="bi bi-sun fs-5"></i> <br>
                        <p class="m-0 paragraf-icon-dark-light">
                            light-zone
                        </p>
                    </button>
                
            </div>
        </div> -->
        <!--END PANNELLO DELLE ACCESSIBILITA-->
    </main>
    <!--START-MESSAGGIO-NEL CASO NON ESISTA PRODOTTO-->

    <!--
    <div class="col-12 col-md-6 mt-5 text-center">
        <h1 class="text-danger">Non sono persenti annunci per la categoria {{ $category->name }}</h1>
        <h2 class="mt-5">Aggiungi subito un'annuncio!</h2>
        <a class="btn btn-outline-primary fs-4  text-decoration-none" href="{{ route('announcement.create') }}">
            Crea Nuovo Annuncio
        </a>
    </div> -->


    <!--END-MESSAGGIO-NEL CASO NON ESISTA PRODOTTO-->

    <!--FOOTER-->
    <x-footer />
    <!--SCRIPT-->
    <script>
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
        var value = document.getElementById("titolo").innerText;
        var out = document.getElementsByClassName("coloreCambia");

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

        //questa funzione mi permette che allo scroll si sposta il titolo diventa fisso e si fa pi picolo
        // window.addEventListener("scroll", (event) => {
        //     let scrollTop = document.documentElement.scrollTop;
        //     let primoSloganDiv = document.getElementById("primoSloganDiv");
        //     let titolo = document.getElementById("titoloSposta");
        //     let topPrimoSloganDiv = primoSloganDiv.offsetTop;

        //     if (scrollTop > topPrimoSloganDiv) {
        //         titolo.style.justifyContent = "start";
        //         titolo.style.position = "sticky";
        //         titolo.style.top = "150px";
        //         titolo.style.width = "25%";
        //     } else {
        //         titolo.style.justifyContent = "center";
        //         titolo.style.width = "100%";
        //     }
        // })

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
