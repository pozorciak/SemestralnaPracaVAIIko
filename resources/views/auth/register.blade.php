@extends('layouts.app')

@section('content')
{{--    <body class="Registracia">--}}
    <div class="container">
        <img src="{{asset('images/bakgrsnowpark.jpg')}}" alt="poz1" class="pozadieStranok">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <div class="card bg-dark border-white">
                    <div class="card-header bg-dark text-white">Registrácia</div>

                    <div class="card-body bg-dark">
                        <form method="POST" action="{{ route('register') }}" >
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right text-white" >Meno</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror"  placeholder="Meno" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right text-white">E-mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="E-mail"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right text-white">Heslo</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="Heslo"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right text-white">Potvrdenie
                                    hesla</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" placeholder="Heslo"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 text-md-center">
                                    <button type="submit" class="btn btn-primary">
                                        Registrovať
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    </body>--}}
@endsection
