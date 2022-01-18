<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Interfaces\ForecastRepositoryInterface;

class ForecastsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private ForecastRepositoryInterface $forecastRepository;

    public function __construct(ForecastRepositoryInterface $forecastRepository) 
    {
        $this->forecastRepository = $forecastRepository;
    }

    public function show()
    {

        request()->validate([

            'city_name' => ['required', 'min:2', 'max:20']
            
        ]);

        return $this->forecastRepository->getDirection($degrees);

        // function direction($degrees)
        // {
        //     $direction = "undefined";
        //     switch ($degrees){

        //         case ($degrees >= 0 && $degrees <= 22.5):
        //             $direction = "north";
        //             break;

        //         case ($degrees >= 22.6 && $degrees <= 67.4 ):
        //             $direction = "north east";
        //             break;

        //         case ($degrees >= 67.5 && $degrees <= 112.5 ):
        //             $direction = "east";
        //             break;

        //         case ($degrees >= 112.6 && $degrees <= 157.4 ):
        //             $direction = "south east";
        //             break;

        //         case ($degrees >= 157.5 && $degrees <= 202.5 ):
        //             $direction = "south";
        //             break;

        //         case ($degrees >= 202.6 && $degrees <= 247.4 ):
        //             $direction = "south west";
        //             break;

        //         case ($degrees >= 247.5 && $degrees <= 292.5 ):
        //             $direction = "west";
        //             break;

        //         case ($degrees >= 292.6 && $degrees <= 337.4 ):
        //             $direction = "north west";
        //             break;

        //         case ($degrees >= 337.5 && $degrees <= 360):
        //             $direction = "north";
        //             break;
        //     }
        //     return $direction;
        // }

        

        
        // $country_index = 'Greece'; //optional
        // $results = Http::get('api.openweathermap.org/data/2.5/weather?q='.$city_name.','.$country_index.'&appid='.$api_key)->json();
        
        $api_key = config('services.owm.token'); //this retrieves the services.php file which itself retrieves the api key from the .env file
        $city_name = htmlspecialchars(request('city_name')); //can use spaces
        $results = Http::get('api.openweathermap.org/data/2.5/weather?q='.$city_name.','.'&appid='.$api_key)->json();
        // dd($results);
        // dd($string_direction);

        // dd(direction($results['wind']['deg']));
        //checks if the returned json contains the weather values, meaning if the results are good to be displayed. 
        //if the results are ok, it returns the view with the results.
        // if (isset($results['weather']))         
        if(isset($results['cod']) && $results['cod'] == 200)
        {   

            // dump($results);
            $string_direction = direction($results['wind']['deg']);
            $icon_name = $results['weather']['0']['icon'];
            $temprature_kelvin = $results['main']['temp'];
            $temprature_celsius = $temprature_kelvin -272.15;
            $feels_like_kelvin = $results['main']['feels_like'];
            $feels_like_celsius = $feels_like_kelvin -272.15; 
            return view('results', [
            'results' => $results,
            'string_direction' => $string_direction,
            'icon_name' => $icon_name,
            'temprature_celsius' => $temprature_celsius,
            'feels_like_celsius' => $feels_like_celsius,

            ]);

        }
        //if the results are not okay, it returns the "search" page with an error message appended
        // else if(!isset($results['weather'])) 
        else
        {
            // echo ('City not found or data not available.');
            // die;

            return redirect('/search')->with('search_error', "City $city_name not found or data not available.");
            // return redirect('/account')->with('success', "The Event with ID " . $event_id . " has been deleted");
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function show($id)
    // {
    //     //
    // }

    public function index()
    {

        

        function direction($degrees)
        {
            $direction = "undefined";
            switch ($degrees){

                case ($degrees >= 0 && $degrees <= 22.5):
                    $direction = "north";
                    break;

                case ($degrees >= 22.6 && $degrees <= 67.4 ):
                    $direction = "north east";
                    break;

                case ($degrees >= 67.5 && $degrees <= 112.5 ):
                    $direction = "east";
                    break;

                case ($degrees >= 112.6 && $degrees <= 157.4 ):
                    $direction = "south east";
                    break;

                case ($degrees >= 157.5 && $degrees <= 202.5 ):
                    $direction = "south";
                    break;

                case ($degrees >= 202.6 && $degrees <= 247.4 ):
                    $direction = "south west";
                    break;

                case ($degrees >= 247.5 && $degrees <= 292.5 ):
                    $direction = "west";
                    break;

                case ($degrees >= 292.6 && $degrees <= 337.4 ):
                    $direction = "north west";
                    break;

                case ($degrees >= 337.5 && $degrees <= 360):
                    $direction = "north";
                    break;
            }
            return $direction;
        }


        $api_key = config('services.owm.token'); //this retrieves the services.php file which itself retrieves the api key from the .env file
        $city_name = htmlspecialchars(request('city_name')); //can use spaces

        $city0_id = 2643743; //London
        $city1_id = 2950159; //Berlin
        $city2_id = 2968815; //Paris
        $city3_id = 3169070; //Rome
        $results = Http::get('http://api.openweathermap.org/data/2.5/group?id='.$city0_id.','.$city1_id.','.$city2_id.','.$city3_id.'&units=metric '.'&appid='.$api_key)->json();

        // dd($results);

        // return view('popular', [
        //     'results' => $results,
        // ]);




        // if(isset($results['cod']) && $results['cod'] == 200)
        // {   

            // dump($results);

            $name_city0 = $results["list"]['0']["name"];
            $country_city0 = $results["list"]['0']["sys"]["country"];
            $string_direction_city0 = direction($results["list"]['0']['wind']['deg']);
            $icon_name_city0 = $results["list"]['0']['weather']['0']['icon'];
            $temprature_kelvin_city0 = $results["list"]['0']['main']['temp'];
            $temprature_celsius_city0 = $temprature_kelvin_city0 -272.15;
            $feels_like_kelvin_city0 = $results["list"]['0']['main']['feels_like'];
            $feels_like_celsius_city0 = $feels_like_kelvin_city0 -272.15;
            $humidity_city0 = $results["list"]["0"]["main"]["humidity"];
            $wind_city0 = $results["list"]['0']["wind"]["speed"];

            
            $name_city1 = $results["list"]['1']["name"];
            $country_city1 = $results["list"]['1']["sys"]["country"];
            $string_direction_city1 = direction($results["list"]['1']['wind']['deg']);
            $icon_name_city1 = $results["list"]['1']['weather']['0']['icon'];
            $temprature_kelvin_city1 = $results["list"]['1']['main']['temp'];
            $temprature_celsius_city1 = $temprature_kelvin_city1 -272.15;
            $feels_like_kelvin_city1 = $results["list"]['1']['main']['feels_like'];
            $feels_like_celsius_city1 = $feels_like_kelvin_city1 -272.15;
            $humidity_city1 = $results["list"]["1"]["main"]["humidity"];
            $wind_city1 = $results["list"]['1']["wind"]["speed"];

            
            $name_city2 = $results["list"]['2']["name"];
            $country_city2 = $results["list"]['2']["sys"]["country"];
            $string_direction_city2 = direction($results["list"]['2']['wind']['deg']);
            $icon_name_city2 = $results["list"]['2']['weather']['0']['icon'];
            $temprature_kelvin_city2 = $results["list"]['2']['main']['temp'];
            $temprature_celsius_city2 = $temprature_kelvin_city2 -272.15;
            $feels_like_kelvin_city2 = $results["list"]['2']['main']['feels_like'];
            $feels_like_celsius_city2 = $feels_like_kelvin_city2 -272.15;
            $humidity_city2 = $results["list"]["2"]["main"]["humidity"];
            $wind_city2 = $results["list"]['2']["wind"]["speed"];

            
            $name_city3 = $results["list"]['3']["name"];
            $country_city3 = $results["list"]['3']["sys"]["country"];
            $string_direction_city3 = direction($results["list"]['3']['wind']['deg']);
            $icon_name_city3 = $results["list"]['3']['weather']['0']['icon'];
            $temprature_kelvin_city3 = $results["list"]['3']['main']['temp'];
            $temprature_celsius_city3 = $temprature_kelvin_city3 -272.15;
            $feels_like_kelvin_city3 = $results["list"]['3']['main']['feels_like'];
            $feels_like_celsius_city3 = $feels_like_kelvin_city3 -272.15;
            $humidity_city3 = $results["list"]["3"]["main"]["humidity"];
            $wind_city3 = $results["list"]['3']["wind"]["speed"];




            return view('popular', [
            'results' => $results,

            'string_direction_city0' => $string_direction_city0,
            'icon_name_city0' => $icon_name_city0,
            'temprature_celsius_city0' => $temprature_celsius_city0,
            'name_city0' => $name_city0,
            'country_city0' => $country_city0,
            'humidity_city0' => $humidity_city0,
            'wind_city0' => $wind_city0,
           //'feels_like_celsius_city0' => $feels_like_celsius_city0,

           
           'string_direction_city1' => $string_direction_city1,
           'icon_name_city1' => $icon_name_city1,
           'temprature_celsius_city1' => $temprature_celsius_city1,
           'name_city1' => $name_city1,
           'country_city1' => $country_city1,
           'humidity_city1' => $humidity_city1,
           'wind_city1' => $wind_city1,
          //'feels_like_celsius_city0' => $feels_like_celsius_city1,

          
          'string_direction_city2' => $string_direction_city2,
          'icon_name_city2' => $icon_name_city2,
          'temprature_celsius_city2' => $temprature_celsius_city2,
          'name_city2' => $name_city2,
          'country_city2' => $country_city2,
          'humidity_city2' => $humidity_city2,
          'wind_city2' => $wind_city2,
         //'feels_like_celsius_city0' => $feels_like_celsius_city2,

         
         'string_direction_city3' => $string_direction_city3,
         'icon_name_city3' => $icon_name_city3,
         'temprature_celsius_city3' => $temprature_celsius_city3,
         'name_city3' => $name_city3,
         'country_city3' => $country_city3,
         'humidity_city3' => $humidity_city3,
          'wind_city3' => $wind_city3,
        //'feels_like_celsius_city0' => $feels_like_celsius_city3,


            ]);
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
