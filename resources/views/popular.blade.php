@extends('layout')

@section('head')
<title>Forecasts - Popular Cities</title>
@endsection

@section('page-header')
<h1>Forecasts - Popular Cities</h1>
@endsection




@section('middle')
<div id="middle-popular">
    

        
    <div class="popular-card" id="popular-city_name">
        <img src="{{asset('images/city_cards/medium_size/London.jpg')}}" alt="">
        <div id="popular-card-details">

            <div class="popular-card-country">
                <img  id="popular-card-icon" src="{{asset('images/icons/countries/'.$country_city0.'.svg')}}" alt="">
                <span>{{$name_city0}}, {{$country_city0}}</span>
            </div>
            <div class="popular-card-description">
                @includeIf('icons.description.' . $results["list"]['0']['weather']['0']['icon'])                
                <span>{{ucwords($results["list"]['0']["weather"]["0"]["description"])}}</span>
            </div>
            <div class="popular-card-temprature">
                @switch($temprature_celsius_city0)
                @case($temprature_celsius_city0 < -10)
                    @includeIf('icons.temprature.below_minus_10')
                @break
                
                @case($temprature_celsius_city0 >= -10 && $temprature_celsius_city0 <= 0)
                    @includeIf('icons.temprature.0_to_minus_10')
                @break

                @case($temprature_celsius_city0 > 0 && $temprature_celsius_city0 <= 15)
                    @includeIf('icons.temprature.10_to_0')
                @break

                @case($temprature_celsius_city0 > 15 && $temprature_celsius_city0 <= 35)
                    @includeIf('icons.temprature.35_to_10')
                @break

                @case($temprature_celsius_city0 > 35)
                    @includeIf('icons.temprature.above_35')
                @break

            @endswitch
                <span>{{$temprature_celsius_city0}} °C</span>
            </div>
            <div class="popular-card-humidity">
            @includeIf('icons.humidity.humidity_default')
                <span>{{$humidity_city0}}%</span>
            </div>
            <div class="popular-card-wind">
            @includeIf('icons.wind.wind_default')
                <span>{{$wind_city0}} m/s </br> {{ucwords($string_direction_city0)}}</span>
            </div>
        </div>
    </div>

    
    <div class="popular-card" id="popular-city_name">
        <img src="{{asset('images/city_cards/medium_size/Berlin.jpg')}}" alt="">
        <div id="popular-card-details">

            <div class="popular-card-country">
                <img  id="popular-card-icon" src="{{asset('images/icons/countries/'.$country_city1.'.svg')}}" alt="">
                <span>{{$name_city1}}, {{$country_city1}}</span>
            </div>
            <div class="popular-card-description">
                @includeIf('icons.description.' . $results["list"]['1']['weather']['0']['icon'])                
                <span>{{ucwords($results["list"]['1']["weather"]["0"]["description"])}}</span>
            </div>
            <div class="popular-card-temprature">
                @switch($temprature_celsius_city1)
                @case($temprature_celsius_city1 < -10)
                    @includeIf('icons.temprature.below_minus_10')
                @break
                
                @case($temprature_celsius_city1 >= -10 && $temprature_celsius_city1 <= 0)
                    @includeIf('icons.temprature.0_to_minus_10')
                @break

                @case($temprature_celsius_city1 > 0 && $temprature_celsius_city1 <= 15)
                    @includeIf('icons.temprature.10_to_0')
                @break

                @case($temprature_celsius_city1 > 15 && $temprature_celsius_city1 <= 35)
                    @includeIf('icons.temprature.35_to_10')
                @break

                @case($temprature_celsius_city1 > 35)
                    @includeIf('icons.temprature.above_35')
                @break

            @endswitch
                <span>{{$temprature_celsius_city1}} °C</span>
            </div>
            <div class="popular-card-humidity">
            @includeIf('icons.humidity.humidity_default')
                <span>{{$humidity_city1}}%</span>
            </div>
            <div class="popular-card-wind">
            @includeIf('icons.wind.wind_default')
                <span>{{$wind_city1}} m/s </br> {{ucwords($string_direction_city1)}}</span>
            </div>
        </div>
    </div>


    
    <div class="popular-card" id="popular-city_name">
        <img src="{{asset('images/city_cards/medium_size/Paris.jpg')}}" alt="">
        <div id="popular-card-details">

            <div class="popular-card-country">
                <img  id="popular-card-icon" src="{{asset('images/icons/countries/'.$country_city2.'.svg')}}" alt="">
                <span>{{$name_city2}}, {{$country_city2}}</span>
            </div>
            <div class="popular-card-description">
                @includeIf('icons.description.' . $results["list"]['2']['weather']['0']['icon'])                
                <span>{{ucwords($results["list"]['2']["weather"]["0"]["description"])}}</span>
            </div>
            <div class="popular-card-temprature">
                @switch($temprature_celsius_city2)
                @case($temprature_celsius_city2 < -10)
                    @includeIf('icons.temprature.below_minus_10')
                @break
                
                @case($temprature_celsius_city2 >= -10 && $temprature_celsius_city2 <= 0)
                    @includeIf('icons.temprature.0_to_minus_10')
                @break

                @case($temprature_celsius_city2 > 0 && $temprature_celsius_city2 <= 15)
                    @includeIf('icons.temprature.10_to_0')
                @break

                @case($temprature_celsius_city2 > 15 && $temprature_celsius_city2 <= 35)
                    @includeIf('icons.temprature.35_to_10')
                @break

                @case($temprature_celsius_city2 > 35)
                    @includeIf('icons.temprature.above_35')
                @break

            @endswitch
                <span>{{$temprature_celsius_city2}} °C</span>
            </div>
            <div class="popular-card-humidity">
            @includeIf('icons.humidity.humidity_default')
                <span>{{$humidity_city2}}%</span>
            </div>
            <div class="popular-card-wind">
            @includeIf('icons.wind.wind_default')
                <span>{{$wind_city2}} m/s </br> {{ucwords($string_direction_city2)}}</span>
            </div>
        </div>
    </div>


    
    <div class="popular-card" id="popular-city_name">
        <img src="{{asset('images/city_cards/medium_size/Rome.jpg')}}" alt="">
        <div id="popular-card-details">

            <div class="popular-card-country">
                <img  id="popular-card-icon" src="{{asset('images/icons/countries/'.$country_city3.'.svg')}}" alt="">
                <span>{{$name_city3}}, {{$country_city3}}</span>
            </div>
            <div class="popular-card-description">
                @includeIf('icons.description.' . $results["list"]['3']['weather']['0']['icon'])                
                <span>{{ucwords($results["list"]['3']["weather"]["0"]["description"])}}</span>
            </div>
            <div class="popular-card-temprature">
                @switch($temprature_celsius_city3)
                @case($temprature_celsius_city3 < -10)
                    @includeIf('icons.temprature.below_minus_10')
                @break
                
                @case($temprature_celsius_city3 >= -10 && $temprature_celsius_city3 <= 0)
                    @includeIf('icons.temprature.0_to_minus_10')
                @break

                @case($temprature_celsius_city3 > 0 && $temprature_celsius_city3 <= 15)
                    @includeIf('icons.temprature.10_to_0')
                @break

                @case($temprature_celsius_city3 > 15 && $temprature_celsius_city3 <= 35)
                    @includeIf('icons.temprature.35_to_10')
                @break

                @case($temprature_celsius_city3 > 35)
                    @includeIf('icons.temprature.above_35')
                @break

            @endswitch
                <span>{{$temprature_celsius_city3}} °C</span>
            </div>
            <div class="popular-card-humidity">
            @includeIf('icons.humidity.humidity_default')
                <span>{{$humidity_city3}}%</span>
            </div>
            <div class="popular-card-wind">
            @includeIf('icons.wind.wind_default')
                <span>{{$wind_city3}} m/s </br> {{ucwords($string_direction_city3)}}</span>
            </div>
        </div>
    </div>







</div>
@endsection

