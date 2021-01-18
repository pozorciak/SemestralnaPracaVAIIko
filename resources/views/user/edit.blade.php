@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="{{asset('images/bakgrsnowpark.jpg')}}" alt="poz1" class="pozadieStranok">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-dark">
                    <div class="card-header bg-dark">{{ __('Editácia užívateľa') }}</div>

                    <div class="card-body bg-dark">
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
