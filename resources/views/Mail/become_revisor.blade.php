<x-layout>
    <x-navTre />

    <div class="container my-5 pt-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center mt-5">
                    <h1> {{ __('ui.vuoi-lavorare-con-noi') }}</h1>
                    <h2> {{ __('ui.rivedi-dati') }}</h2>


          
                        <h5 class="card-title">
                            <p> {{ __('ui.nome') }}: {{ $user->name }}</p>
                            <p> {{ __('ui.email') }}: {{ $user->email }}</p>
                            <p> {{ __('ui.diventa-revisore-clicca-qui') }}</p>
                            <a  href="{{ route('become.revisor', compact('user')) }}" class="rendi btn btn-outline-primary">{{ __('ui.invia-richiesta') }}
                            </a>
                    
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</x-layout>