@extends('layouts.app')

@section('content')
    <div class="container ">
        <img src="{{asset('images/bakgrsnowpark.jpg')}}" alt="poz1" class="pozadieStranok">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-dark border-white">
                    <div class="card-header bg-dark text-white">Pridanie nového užívateľa</div>

                    <div class="card-body bg-dark text-white">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                       @include("user.form")
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
