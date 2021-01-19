@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Používatelia</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @can("create",\App\Models\User::class)
                        @endcan
                        {!! $grid->show() !!}
                        <div class="mb-3">
                            <a href="{{ route("user.create") }}" class="btn btn-sm btn-block" role="button">+ Pridať
                                nového používateľa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
