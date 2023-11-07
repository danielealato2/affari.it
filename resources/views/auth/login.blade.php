<x-layout>
    <div class="paginalog container my-5">
        <div class="row ">
            <div class="col-12 col-md-8">
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
                    <div class="alert alert-warning col-md-6" role="alert">Per richiedere di diventare revisore devi loggarti!</div>
                    <div class="form-outline form-white mb-4">
                        <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg"
                            required />
                        <label class="form-label" for="typeEmailX" required>Email</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg"
                            required />
                        <label class="form-label" for="typePasswordX" required>Password</label>
                    </div>

                    <button class="rendi btn btn-outline-primary" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
