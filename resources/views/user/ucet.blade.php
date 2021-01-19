@extends('layouts.app')

@section('content')
    @auth
        <img src="{{asset('images/skiservisBack.jpg')}}" alt="poz1" class="pozadieStranok">
        <div class="container col-md-3">
            <div class="card bg-dark col-md-12">
                <p>Meno : {{ Auth::user()->name }}</p>
                <p>E-mail : {{ Auth::user()->email }}</p>
                <p>Dátum registrácie : {{ Auth::user()->created_at }}</p>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a type="button" class="btn btn-secondary border-white nav-link"
                            href="{{ route('user.edit', Auth::user()->id) }}">Upraviť profil
                    </a>
                    <a href="{{ route('user.delete',  Auth::user()->id) }}"  type="button" class="btn btn-secondary border-white"  onclick="return confirm('Naozaj si prajete zmazať účet ?');">Zmazať účet</a>

                </div>

            </div>
        </div>
        </div>
    @endauth
@endsection
