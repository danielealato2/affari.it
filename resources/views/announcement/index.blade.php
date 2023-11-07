<x-layout>
    <x-navTre />


    <!--Start Card Announcement -->
    <section class="section-index">
        <div class="container pe-3 ps-3 my-5 containerElettrodomesticiHome">

            <div class="row" id="secondoSlogan">
                @forelse ($announcements as $announcement)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center px-1">
                        <!--CARD-->
                        <a class="linkShow" href="{{ route('announcement.show', ['announcement' => $announcement]) }}">
                            <div class="cardBox my-4">
                                <img class="img-card-official"
                                    src="{{ !$announcement->images->isEmpty() ? $announcement->images->first()->getUrl(215, 230) : asset('img/default-image.jpg') }}"
                                    {{-- $announcement->images()->first()->getUrl(400, 300)  per il resize --}}>
                                <div class="corpoCard pt-4 px-3 pb-1 bg-light">
                                    <p class="prezzoCard">
                                        {{ $announcement->price }} €
                                    </p>
                                    <h5 class="titoloCard mt-3">
                                        {{ $announcement->title }}
                                    </h5>
                                    <h5 class="titoloCard mt-3">
                                        {{ $announcement->category->name }}
                                    </h5>
                                    <h6 class="pubblicatoCard mb-0">
                                        Pubblicato da {{ $announcement->user->name ?? '' }} <br>
                                        Il {{ $announcement->created_at->format('d/m/y') }}
                                    </h6>
                                </div>
                            </div>
                        </a>
                        <!--CARD-->
                    </div>
                @empty
                    <div class="col-12 my-5">
                        <div class="alert alert-warning py-3 shadow " style="margin-top: 60px">
                            <p class="lead text-center">
                                Non ci sono annunci per questa ricerca. Prova con altro!
                            </p>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
    <!--End Card Announcement -->

    <!--PULSANTE-TORNA-SU-->
    <span onclick="tornaSu()">
        <div class="btnVaiSu" id="btnSu">
            <i class="bi bi-arrow-up-short fs-3 m-0 p-0 text-center"></i>
            <p class="m-0 paragrafovaiSu text-center">Top</p>
        </div>
    </span>
    <!--PULSANTE-TORNA-SU-->

    <x-footer />

    <script>
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
    </script>
</x-layout>
