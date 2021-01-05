@extends('layouts.app')


@section('content')
    <div>
        <div class="content">
            <h1>WinterPark Martinky</h1>
            <p>"Blízko neba, blízko teba"</p>
            <i>Zdroj:https://www.youtube.com/watch?v=8QcwHJ6Tylo</i>
        </div>
        <div>
            <video autoplay muted loop id="myVideo">
                {{--   zdroj:https://www.youtube.com/watch?v=7cjq3LVhRTE--}}
                <source src="{{asset('video/Martinky.mp4')}}" type="video/mp4">
            </video>
        </div>
    </div>

@endsection
