<x-layout>
    <x-navTre />


    <!-- URL::previous() non richiede una rotta; torna alla pagina precedente rispetto alla posizione dell utente -->


    <div style="margin-top:120px">
        @if ($announcement_to_check)
            <div class="text-center">
                <h2>{{ __('ui.revisione-annunci-pieno') }}</h2>
            </div>
        @else
            <div class="text-center" style="height: 520px">
                <h2>{{ __(__('ui.revisione-annunci-vuoto')) }}</h2>
            </div>
        @endif
    </div>

    @if ($announcement_to_check)
        <div class="container
                mb-5 "
            style="box-shadow: rgb(228, 232, 234) 0px 8px 35px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset; border-radius:10px;">
            <div class="row d-flex justify-content-center text-center align-items-start  ">
                <!-- carosello imamgini con tags e revisione immagine -->
                <div class="col-12 col-md-7 d-flex justify-content-center align-items-center flex-column p-5 ">
                    @if ($announcement_to_check->images->isNotEmpty())
                        <!-- carosello -->
                        <div id="carouselExample" class="carousel slide carousel-revisore">
                            <div class="carousel-inner">
                                <!-- immagine carosello -->
                                @foreach ($announcement_to_check->images as $image)
                                    <div class="carousel-item  {{ $loop->first ? 'active' : '' }} text-center">
                                        <img style="object-fit: contain" src="{{ $image->getUrl(400, 300) }}"
                                            class="img-fluid rounded-3" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align justify-content-center mt-3 ">
                            <!-- button sinistro carosello -->
                            <button class="carousel-control-prev  carousel-button-revisore-sx mx-2" type="button"
                                data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <!--col Tags -->
                            <div class="btn-group mx-1">
                                <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Tags
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="p-2">
                                        @if ($image->labels)
                                            @foreach ($image->labels as $label)
                                                <p class="d-inline">{{ $label }},</p>
                                            @endforeach
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <!-- Revisione Immagini -->
                            <div class="btn-group">
                                <button style="background-color: #444444" type="button"
                                    class="btn dropdown-toggle btn-sm text-light" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ __('ui.revisione-immagini') }}
                                </button>
                                <ul class="dropdown-menu  px-2">
                                    <li>
                                        <p> {{ __('ui.adulti') }} : <span class="{{ $image->adult }}"></span></p>
                                        <p>{{ __('ui.Satira') }} : <span class="{{ $image->spoof }}"></span></p>
                                        <p>{{ __('ui.Medicina') }} : <span class="{{ $image->medical }}"></span></p>
                                        <p>{{ __('ui.Violenza') }} : <span class="{{ $image->violence }}"></span></p>
                                        <p>{{ __('ui.Contenuto Ammiccante') }} : <span
                                                class="{{ $image->racy }}"></span></p>
                                    </li>
                                </ul>
                            </div>
                            <!--Destro button carosello -->
                            <button class="carousel-control-next  carousel-button-revisore-dx mx-2" type="button"
                                data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <!--Altrimenti mostra l immagine di default -->
                    @else
                        <div class="col-12 col-md-6 d-flex flex-column ">
                            <img width="450px" height="450px" src="\img\default-image.jpg" class="img-fluid "
                                alt="">

                        </div>
                    @endif
                </div>
                <!-- summary annuncio -->
                <div class="col-12 col-md-5 d-flex flex-column  align-items-center text-secondary p-5 "
                    style="font-family: 'lato'">
                    <div class="card-body fs-4">
                        <!--titolo annuncio -->
                        <span class="card-title  text-uppercase ">
                            {{ __('ui.titolo') }}: {{ $announcement_to_check->title }}
                        </span>

                        <!-- dati annuncio -->
                        <div class="d-flex flex-column ">
                            <span class="card-title text-capitalize ">
                                {{ __('ui.categoria') }} : {{ $announcement_to_check->category->name }}
                            </span>
                            <span class="card-description">
                                {{ __('ui.descrizione') }}: <span
                                    style="font-size: 18px">{{ $announcement_to_check->description }}
                                </span>
                            </span><br>
                            <span class="card-footer">
                                {{ __('ui.pubblicato-da') }} :
                                {{ $announcement_to_check->user->name ?? 'Autore Sconosciuto' }}

                            </span>
                            <span class="card-footer">
                                {{ __('ui.il') }} :
                                {{ $announcement_to_check->created_at->format('d/m/Y') }}
                            </span>
                        </div>
                        <!-- button accetta e cancella anuncio -->
                        <div class="row  mt-5 ">
                            <div class="col-12 col-md-12 text-center d-flex justify-content-center ">
                                <form
                                    action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                                    method="POST" class="mx-3">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="btn btn-outline-dark  animate__animated animate__bounce d-flex align-items-center">
                                        <i class="bi bi-check text-success fs-3"></i>
                                        {{ __('ui.accetta') }}
                                    </button>
                                </form>
                                <form
                                    action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="btn btn-outline-dark animate__animated animate__bounce animate__delay-2s d-flex align-items-center">
                                        <i class="bi bi-x text-danger fs-3"></i>
                                        {{ __('ui.rifiuta') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    @endif








    {{-- 
    <!-- Start Container Titolo Pagina-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12">
                <h2 class="display-4 text-center">
                    {{ $announcement_to_check ? __('ui.revisione-annunci-pieno') : __('ui.revisione-annunci-vuoto') }}
                </h2>
            </div>
        </div>
    </div>
    <!-- start container dati annuncio da revisionare -->
    <div class="container-fluid p-3 ">
        <div class="row d-flex justify-content-center mt-2 align-items-center ">
            <!-- se c è l annuncio -->
            @if ($announcement_to_check)
                <div class="col-12 col-md-6 p-3 d-flex justify-content-end bg-danger ">
                    <!--e SE  ci sono delle immagini caricate dall 'utente' allora mostra l immagine -->
                    @if ($announcement_to_check->images->isNotEmpty())
                        <!-- immagine carosello -->
                        <div>
                            @foreach ($announcement_to_check->images as $image)
                                <div>
                                    <img src="{{ $announcement_to_check->images->first()->getUrl(400, 300) }}"
                                        class="img-fluid rounded-3" />
                                </div>
                            @endforeach

                            <!--col Tags -->
                            <div class="col-md-4 d-flex justify-content-center bg-warning">
                                <div class="btn-group mx-2">
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Tags
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li class="p-2">
                                            @if ($image->labels)
                                                @foreach ($image->labels as $label)
                                                    <p class="d-inline">{{ $label }},</p>
                                                @endforeach
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                                <!-- Revisione Immagini -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Revisione Immagini
                                    </button>
                                    <ul class="dropdown-menu m-0 px-4">
                                        <li>
                                            <p>Adulti : <span class="{{ $image->adult }}"></span></p>
                                            <p>Satira : <span class="{{ $image->spoof }}"></span></p>
                                            <p>Medicina : <span class="{{ $image->medical }}"></span></p>
                                            <p>Violenza : <span class="{{ $image->violence }}"></span></p>
                                            <p>Contenuto Ammiccante : <span class="{{ $image->racy }}"></span></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <!--Altrimenti mostra l immagine di default -->
                        @else
                            <div class="d-flex flex-column">
                                <img width="200px" height="200px" src="\img\default-image.jpg" class="img-fluid "
                                    alt="">
                                <span class="fs-5 text-center text-warning">
                                    Nessuna immagine caricata
                                </span>
                            </div>
                    @endif
                </div>

                {{-- <!-- card dati utente -->
                <div class="col-12 col-md-6 d-flex flex-column p-3 align-items-center bg-dark ">
                    <div class="card-body d-flex  align-items-start flex-column p-3 text-secondary ">
                        <span class="card-title mb-3 fs-1 text-capitalize ">
                            {{ __('ui.titolo') }}: {{ $announcement_to_check->title }}
                        </span>
                        <span class="card-description fs-2 ">
                            {{ __('ui.descrizione') }}: {{ $announcement_to_check->description }}
                        </span><br>
                        <span class="card-footer fs-2 ">
                            {{ __('ui.pubblicato-da') }} :
                            {{ $announcement_to_check->user->name ?? 'Autore Sconosciuto' }}

                        </span>
                        <span class="card-footer fs-2">
                            {{ __('ui.il') }} :
                            {{ $announcement_to_check->created_at->format('d/m/Y') }}
                        </span>

                        </p>
                    </div>
                    <!-- button accetta e cancella anuncio -->
                    <div class=" d-flex justify-content-start align-items-start mb-3">
                        <form
                            action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="btn btn-outline-success btn-lg mx-2 animate__animated animate__bounce">
                                {{ __('ui.accetta') }}</button>
                        </form>
                        <form
                            action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="btn btn-outline-danger btn-lg animate__animated animate__bounce animate__delay-2s">
                                {{ __('ui.rifiuta') }}</button>
                        </form>
                    </div>

                </div> 
    @endif
    --}}
    <x-footer />

</x-layout>
