@extends('layouts.app')

@section('content')

    {{--    <body class=PonukyIndex></body>--}}



    <div class="container rounded">
        <img src="{{asset('/images/poz1.jpg')}}" alt="poz1" class="pozadieStranok">
        <div class="row">
            @if($sluzby->count())
                @foreach($sluzby as $key => $ponuka)
                    <div class="ponuka col-md-6">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body bg-light rounded">
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
                                    <p>{{ date('d F Y', strtotime($ponuka->datum))  }}</p>
                                </div>
                                <div>
                                    <h5>Čas odjazdu : </h5>
                                    <p>{{ date('H:i', strtotime($ponuka->datum))  }}</p>
                                </div>

                                <div>
                                    <h5>Poznamka: </h5>
                                    <p class="card-text">{{ $ponuka->poznamka }}</p>
                                </div>


                            </div>

                            <div class="card-footer">
                                @if(Auth::user())
                                    @if((Auth::user()->id) == $ponuka->created_by_id || Auth::user()->name == "admin")
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group ">
                                                <button value= "{{ $ponuka->id }}"
                                                   class="delete btn btn-sm btn-danger" title="DELETE" role="button"
                                                   aria-pressed="true"
                                                   >Vymazať</button>
                                                <a href="{{ route('sluzby.edit.update', $ponuka) }}"
                                                   class="btn btn-sm btn-success" role="button"
                                                   aria-pressed="true">Upraviť</a>
                                            </div>
                                            <small class="text-muted"></small>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    @if(Auth::user())
        <div class="container">
            <a class="btn btn-info rounded-pill" href="{{ route('sluzby.add') }}" role="button"> + Pridať ponuku
                spolujazdy</a>
        </div>
    @endif
@endsection


