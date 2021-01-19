@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="{{asset('/images/poz2.jpg')}}" alt="poz1" class="pozadieStranok">
        <div class="row">
            @if($pripomienky->count())
                @foreach($pripomienky as $key => $pripomienka)
                    <div class="ponuka col-md-6">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body bg-light rounded">
                                <div>
                                    <h5>Meno : </h5>
                                    @if($pripomienka->meno == "")
                                        <p>Anonym</p>
                                    @else
                                        <p>{{ $pripomienka->meno }}</p>
                                    @endif
                                </div>
                                <div>
                                    <h5>Text :</h5>
                                    <p>{{ $pripomienka->text }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
