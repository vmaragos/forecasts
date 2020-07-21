<!DOCTYPE html>

<html>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Karma:wght@300&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Karma:wght@500&display=swap" rel="stylesheet">
        <!-- <title>Forests - Vasileios Maragkos</title> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{asset('images/tree.png')}}">
        <link rel="stylesheet" href="{{asset('css/default.css')}}">
        <!-- <script type="text/javascript" src="{{asset('js/index.js')}}"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
        @yield('head')

    <body>
        

        @yield('background_image_cycle')
            

        <div id="top-navi">
            <ul id="buttons">
                <li id="button1" class="{{ Request::path() === 'search' ? 'button active-button' : 'button inactive-button' }}">
                    <a href="{{url('search')}}" accesskey="1">
                        <div>
                            <span>Search City</span>
                        </div> 
                    </a>                                   
                </li>
                <li id="button2" class="{{ Request::path() === 'popular' ? 'button active-button' : 'button' }}">
                    <a href="{{url('popular')}}" accesskey="2">
                        <div>
                            <span>Popular Cities</span>
                        </div>
                    </a>                    
                </li>
            </ul>
        </div>
        <div id="page-header">
            @yield('page-header')
        </div>
        <!-- <div id="middle-box" style="top: 90vh">
            <h1 style="text-align: center;">Your IP is {{Request::ip()}}</h1>
        </div> -->
        @yield('middle')
    </body>
</html>
