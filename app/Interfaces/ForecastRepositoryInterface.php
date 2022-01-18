<?php

namespace App\Interfaces;

interface ForecastRepositoryInterface 
{
    public function getDirection($degrees);
}
