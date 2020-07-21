@extends('layout')

@section('head')
<title>Forecasts - Search City</title>
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
<h1>Forecasts - Search City</h1>
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
<div id="middle">
    <!-- <form method="GET" action="{{url('api.openweathermap.org/data/2.5/weather?q=Athens&appid=edf5aedc4d7ff735d0d1a6d2c9397af2')}}"> -->
    <form method="GET" action="{{url('/search/results')}}">
        <img src="{{asset('images/icons/iconfinder_Search_858732.svg')}}" alt="">
        <input type="text" name="city_name" placeholder="Search City..." onfocus="middleFocus()" onfocusout="middleFocusOut()">
        
        @if ($message = Session::get('search_error'))
        <div class="alert_message" id="search_error">
            <span>{{$message}}</span>
        </div>
        @endif
        <script>    
            $(window).on("load",function(){
                
                $("#search_error").delay(3000).css({top: '-25vh'}).fadeOut("slow");
                
            });
        </script>

        <button type="submit" >Search</button>
        <?php
            // $url = 'http://api.openweathermap.org/data/2.5/weather?q=Athens&appid=edf5aedc4d7ff735d0d1a6d2c9397af2';
            // $JSON = file_get_contents($url);

            // echo the JSON (you can echo this to JavaScript to use it there)
            // echo $JSON;

            // You can decode it to process it in PHP
            // $data = json_decode($JSON);
            // var_dump($data);
        ?>
    </form>
    
    <!-- <img src="./images/icons/iconfinder_search_322497.svg" alt=""> -->
    
</div>
@endsection