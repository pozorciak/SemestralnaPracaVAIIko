@extends("layouts.app")
@section("content")
    <img src="{{asset('images/bakgrsnowpark.jpg')}}" alt="poz1" class="pozadieStranok">
    <div class="container bg-dark col-md-3">
        <h1>Pošlite nám pripomienku</h1>
        <h5 class="text-md-center text-white">Niečo nefunguje ako má ? Dajte nám o tom vedieť !</h5>
    <form method="post" action="{{ $action }}">
        @csrf
        @method($method)
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="meno" placeholder="Meno*" value="{{ old("meno", @$model->meno) }}">
            <small class="text-white">*meno je nepovinné</small>
        </div>
        <div class="form-group">
         <textarea  name="text" class="form-control formular"
                   placeholder="Tu napíšte svoju pripomienku."
         >{{ old("text", @$model->text) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary tlacidlo">Odoslať</button>
    </form>
    </div>
@endsection
