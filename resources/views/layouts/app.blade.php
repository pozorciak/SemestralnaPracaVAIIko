<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>WinterPark Martinky</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/styly.css') }}" rel="stylesheet">

</head>
<body>

{{--<nav class="navbar navbar-dark bg-dark">--}}
{{--    <a class="navbar-brand" href="{{ url('home') }}" >Martinské hole</a>--}}
{{--    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample01"--}}
{{--            aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--        <span class="navbar-toggler-icon"></span>--}}
{{--    </button>--}}

{{--    <div class="navbar-collapse collapse" id="navbarsExample01" style="">--}}
{{--        <ul class="navbar-nav mr-auto">--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="?c=home">Domov <span class="sr-only">(current)</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="?c=home">O stredisku</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"--}}
{{--                   aria-expanded="false">Služby</a>--}}
{{--                <div class="dropdown-menu" aria-labelledby="dropdown01">--}}
{{--                    <a class="dropdown-item" href="?c=Home&a=SkiServis">Ski Servis</a>--}}
{{--                    <a class="dropdown-item" href="?c=Ponuka">Zdielaná spolujazda</a>--}}
{{--                    <a class="dropdown-item" href="?c=Home&a=Snowpark">SnowPark</a>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</nav>--}}

<div class="web-content">
</div>
{{--</body>--}}
{{--</html>--}}


{{--<body>--}}
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{asset('images/logo.svg')}}" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <a class="nav-link" href="{{ route("user.index") }}" > {{ __("Users") }}</a>
                        @endauth
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

{{--                        <ul class="navbar-nav mr-auto">--}}
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/') }}">Domov <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?c=home">O stredisku</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">Služby</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown0   1">
                                    <a class="dropdown-item" href="{{ url("/sluzby/skiservis") }}" >Ski Servis</a>
                                    <a class="dropdown-item" href={{ route('sluzby.index') }}>Zdielaná spolujazda</a>
                                    <a class="dropdown-item" href="{{ url("/sluzby/snowpark") }}">SnowPark</a>
                                </div>
                            </li>
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Prihlásenie') }}</a>
                                    </li>
                                @endif

{{--                                @if (Route::has('register'))--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registácia') }}</a>--}}
{{--                                    </li>--}}
{{--                                @endif--}}
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest

{{--                        </ul>--}}
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
