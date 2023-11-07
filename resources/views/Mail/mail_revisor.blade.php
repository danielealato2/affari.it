<x-layout>
    <div class="text-center mt-5">
        <h1> {{ __('ui.questo-utente-vuole-lavorare-con-noi') }}</h1>
        <h2> {{ __('ui.ecco-i-suoi-dati') }}</h2>


        <div class="card-body shadow rounded col-6 mx-auto p-3">
            <h5 class="card-title">
                <p> {{ __('ui.nome') }}: {{ $user->name }}</p>
                <p> {{ __('ui.email') }}: {{ $user->email }}</p>
                <p> {{ __('ui.rendilo-revisore-e-clicca-qui') }}</p>
                <a href="{{ route('make.revisor', compact('user')) }}" class="rendi btn btn-outline-primary">
                    {{ __('ui.accetta') }}
                </a>
            </h5>
        </div>
    </div>
</x-layout>