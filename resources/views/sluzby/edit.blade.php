@extends("layouts.app")
@section("content")
    <img src="{{asset('images/bakgrsnowpark.jpg')}}" alt="poz1" class="pozadieStranok">
    <div class="container">
        <h1>Editácia ponuky</h1>
        @include('sluzby.form')
    </div>
@endsection

