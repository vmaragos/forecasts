@extends('layout')


@section('head')
<title>{{$results["name"]}} - Current Weather</title>
<script type="text/javascript" src="{{asset('js/index.js')}}"></script>

<script type="text/javascript">
            $(document).ready(function() {
            $('.section-1').cycle({
                fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
                delay:  0000,
                sync: true
            });
        });
        </script>
    </head>
@endsection

@section('page-header')
<h1>{{$results["name"]}} - Current Weather</h1>
@endsection

@section('background_image_cycle')

<div class="section section-1">
    <img src="{{asset('images/luca-bravo-hFzIoD0F_i8-unsplash.jpg')}}" alt="" style="display: none; z-index: 12; opacity: 0;">
    <img src="{{asset('images/sebastian-unrau-sp-p7uuT0tw-unsplash.jpg')}}" alt="" style="display: none; z-index: 12; opacity: 0;">
    <img src="{{asset('images/michael-benz--IZ2sgQKIhM-unsplash.jpg')}}" alt="" style="display: none; z-index: 12; opacity: 0;">
    <img src="{{asset('images/jordan-ZAOiPdKfXWA-unsplash.jpg')}}" alt="" style="display: none; z-index: 12; opacity: 0;">
    <img src="{{asset('images/kenniku-tolato-a7_RTPWJDhQ-unsplash.jpg')}}" alt="" style="display: none; z-index: 12; opacity: 0;">
    <img src="{{asset('images/joan-oger-ZK_v7Uc7sqQ-unsplash.jpg')}}" alt="" style="display: none; z-index: 12; opacity: 0;"> 
</div>         
@endsection

@section('middle')
<div id="middle-results">
    @includeIf('icons.description.' . $results['weather']['0']['icon'])
    <ul id="result-details">
        <li>
            <span id="result-title">City:</span>
            <img  id="result-icon" src="{{asset('images/icons/countries/'.$results['sys']['country'].'.svg')}}" alt="">
            <span id="result-value">{{$results["name"]}}, {{$results["sys"]["country"]}} </span>
        </li>
        <li>
            <span id="result-title">Description:</span>
            
            @includeIf('icons.description.' . $results['weather']['0']['icon'])
            
            <span id="result-value">{{ucwords($results["weather"]["0"]["description"])}}</span>
        </li>
        <li>
            <span id="result-title">Temprature:</span>
            @switch($temprature_celsius)
                @case($temprature_celsius < -10)
                    @includeIf('icons.temprature.below_minus_10')
                @break
                
                @case($temprature_celsius >= -10 && $temprature_celsius <= 0)
                    @includeIf('icons.temprature.0_to_minus_10')
                @break

                @case($temprature_celsius > 0 && $temprature_celsius <= 15)
                    @includeIf('icons.temprature.10_to_0')
                @break

                @case($temprature_celsius > 15 && $temprature_celsius <= 35)
                    @includeIf('icons.temprature.35_to_10')
                @break

                @case($temprature_celsius > 35)
                    @includeIf('icons.temprature.above_35')
                @break

            @endswitch
            <span id="result-value">{{$temprature_celsius}} °C</span>
        </li>
        <li>
            <span id="result-title">Feels Like:</span>
            @switch($feels_like_celsius)
                @case($feels_like_celsius < -10)
                @includeIf('icons.temprature.below_minus_10')
                @break
                
                @case($feels_like_celsius >= -10 && $feels_like_celsius <= 0)
                    @includeIf('icons.temprature.0_to_minus_10')
                @break

                @case($feels_like_celsius > 0 && $feels_like_celsius <= 15)
                    @includeIf('icons.temprature.10_to_0')
                @break

                @case($feels_like_celsius > 15 && $feels_like_celsius <= 35)
                    @includeIf('icons.temprature.35_to_10')
                @break

                @case($feels_like_celsius > 35)
                    @includeIf('icons.temprature.above_35')
                @break

            @endswitch
            <span id="result-value">{{$feels_like_celsius}} °C</span>
        </li>
        <li>
            <span id="result-title">Humidity:</span>
            @includeIf('icons.humidity.humidity_default')
            <span id="result-value">{{$results["main"]["humidity"]}}%</span>
        </li>
        <li>
            <span id="result-title">Wind:</span>
            @includeIf('icons.wind.wind_default')
            <span id="result-value">{{$results["wind"]["speed"]}} m/s {{ucwords($string_direction)}}</span>
        </li>
    </ul>
</div>

    <a href="{{url('/search')}}">
        <div id="btn-back">
            <svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path class="left-arrow" d="M7.701,14.276l9.586-9.585c0.879-0.878,2.317-0.878,3.195,0l0.801,0.8c0.878,0.877,0.878,2.316,0,3.194  L13.968,16l7.315,7.315c0.878,0.878,0.878,2.317,0,3.194l-0.801,0.8c-0.878,0.879-2.316,0.879-3.195,0l-9.586-9.587  C7.229,17.252,7.02,16.62,7.054,16C7.02,15.38,7.229,14.748,7.701,14.276z"/>
            </svg>
            <span>Back to Search</span>
        </div>
    </a>
@endsection

