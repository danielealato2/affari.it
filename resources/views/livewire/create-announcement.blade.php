<div class="container mb-5">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 py-4 px-5" style="margin-top: 100px;background-color: #f5f5f5;border-radius:12px">
            <div>
                <h2 class="mb-4 text-center">
                    {{ __('ui.inserisci-annuncio') }}
                </h2>
            </div>
            <!-- Start Form inserimento annunci -->
            <div>
                <form wire:submit.prevent="store">
                    @csrf
                    @if (session()->has('announcement'))
                    <div class="alert alert-success" role="alert">{{ session()->get('announcement') }}</div>
                    @endif
                    <!-- Titolo -->
                    <div class="mb-3">
                        <label for="title" class="form-label text-center">
                            {{ __('ui.titolo') }}
                        </label>
                        <input type="text" class="form-control input-register" id="title" wire:model="title" required>
                        @error('title')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Descrizione -->
                    <div class="mb-3">
                        <label for="description" class="form-label text-center">
                            {{ __('ui.descrizione') }}
                        </label>
                        <textarea class="form-control" id="description" wire:model="description" rows="4" required></textarea>
                        @error('description')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Prezzo -->
                    <div class="mb-3">
                        <label for="price" class="form-label">
                            {{ __('ui.prezzo') }}
                        </label>
                        <input type="number" class="form-control" id="price" wire:model="price" step="0.01" required>
                        @error('price')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Scegli Categoria -->
                    <div class="mb-3">
                        <label for="category" class="form-label text-center">
                            {{ __('ui.scegli-categoria') }}
                        </label>
                        <select wire:model.defer="category" id="category" class="seleziona category form-control">
                            <option value="">SELEZIONA CATEGORIA</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3 d-flex flex-column">
                        <label for="formFile" class="form-label">
                            Carica le tue immagini
                        </label>
                        <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="img" />
                        @error('temporary_images.*')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @if (!empty($images))
                    <div class="row d-flex  align-items-center">
                        <div class="col-12 col-md-6 justify-content-center">
                            <h4>
                                {{ __('ui.anteprima-immagini') }}
                            </h4>
                            <div class="row border border-4 border-secondary rounded shadow d-flex justify-content-center align-items-center mb-3">
                                @foreach ($images as $key => $image)
                                <div class="col-5 col-md-5 d-flex flex-column align-items-center">
                                    <img class="img-fluid mt-3" width="200px" height="300px" src="{{ $image->temporaryUrl() }}" />
                                    <div class="mx-auto shadow rounded" style="background-image: url({{ $image->temporaryUrl() }});">
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm m-3" wire:click="removeImage({{ $key }})">
                                        Delete
                                    </button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    <!--End-Scelta-Categorie-->
                    <!-- Pulsante di invio -->
                    <button type="submit" class="carica btn btn-outline-dark mt-5 mb-5"><i class="bi bi-upload"></i>
                        {{ __('ui.carica-articolo') }}
                    </button>
                </form>
                <!-- End Form inserimento annunci -->
            </div>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-center">
            <img class="img-registrazione img-fluid" src="/online-fashion-shopping-collage_23-2150535839.avif" alt="" style="border-radius:14px;margin-top: 100px;">
        </div>
    </div>
</div>