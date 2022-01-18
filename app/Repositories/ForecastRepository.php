<?php

namespace App\Repositories;

use App\Interfaces\ForecastRepositoryInterface;

class ForecastRepository implements ForecastRepositoryInterface 
{
    function getDirection($degrees)
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
}
