@extends('layouts.app')

@section('content')

    <body class=PonukyIndex></body>

    <div class="container">
            <img src="{{asset('/images/poz1.jpg')}}" alt="poz1" class="pozadieLogin">
        <div class="row">
            @if($sluzby->count())
                @foreach($sluzby as $key => $ponuka)
                    <div class="col-md-6">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <div>
                                    <h5>Meno : </h5>
                                    <p>{{ $ponuka->meno }} {{ $ponuka->priezvisko }}</p>
                                </div>
                                <div>
                                    <h5>Kontakt :</h5>
                                    <p>{{ $ponuka->email }}</p>
                                </div>
                                <div>
                                    <h5>Mesto :</h5>
                                    <p> {{ $ponuka->mesto }}</p>
                                </div>
                                <div>
                                    <h5>Dátum odjazdu do strediska : </h5>
                                    <p>{{ $ponuka->datum }}</p>
                                </div>
                                <div>
                                    <h5>Poznamka: </h5>
                                    <p class="card-text">{{ $ponuka->poznamka }}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        {{--                            <a href="?c=Ponuka&a=delete&id=<?= $ponuka->getId() ?>" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">Delete</a>--}}
                                        {{--                            <a href="?c=Ponuka&a=edit&id=<?= $ponuka->getId() ?>" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">Edit</a>--}}
                                    </div>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="container">
        <a class="btn btn-info" href="{{ route('sluzby.add') }}" role="button"> + Pridať ponuku spolujazdy</a>
    </div>
@endsection

