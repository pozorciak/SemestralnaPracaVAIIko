@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="{{asset('images/poz3.jpg')}}" alt="poz1" class="pozadieStranok">
        <div class="row justify-content-center loginCon ">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-dark text-white">{{ __('Prihlásenie') }}</div>

                    <div class="card-body bg-dark">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12 ">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus
                                           placeholder="E-mail ">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password" placeholder="Heslo">
                                    <div class="warning text-danger"></div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-primary loginButt">
                                        {{ __('Prihlásiť sa') }}
                                    </button>
                                </div>
                                <div class="form-group col-md-7">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label text-white" for="remember">
                                            {{ __('Zapamätaj si ma') }}
                                        </label>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-md-center">
                                @if (Route::has('register'))
                                    <a class="btn btn-link"
                                       href="{{ route('register') }}">Ešte nemáš účet ? Klikni sem a registruj sa!</a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center"><h1 class="uvitaciaSprava"></h1></div>
@endsection
