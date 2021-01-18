@extends('layouts.app')
@section('content')
    <div>
        <img src="{{asset('images/skiservisBack.jpg')}}" alt="poz1" class="pozadieStranok">
        <div class="container p-3 my-3 shadow-lg p-3 mb-5 bg-dark rounded text-white" id="servis">
            <div class="col-md-12">
                <h1>Ski Servis</h1>

                <p>Chcete aby bola vaša výstroj opäť ako nová, vaša jazda bezpečná a plynulá? Zverte svoju výstroj do
                    rúk
                    našich odborných servisných pracovníkov. Na servisnom stroji RoffB ošetria hrany a sklznicu
                    lyžiarskeho
                    alebo snowboardového výstroja, namontujú a správne nastavia viazanie, vykonajú drobné opravy a
                    náradím
                    Holmenkol ručne urobia pretekársky servis.
                    <img src="{{asset('images/servis.jpg')}}" class="mx-auto d-block" alt="xxx">
                    Ski servis nájdete pár metrov od spodnej stanice vleku B - Rekreačný v objekte Chata Dvojka.
                    Informácie
                    a rezervácie termínov na čísle +421 907 202 396.
                </p>
            </div>
        </div>
    </div>
@endsection
