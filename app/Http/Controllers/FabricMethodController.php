<?php

namespace App\Http\Controllers;


use App\Creators\AirLogistic;
use App\Creators\Logistic;
use App\Creators\RoadLogistic;

class FabricMethodController extends Controller
{
    public function logistic (Logistic $logistic, string $cargo) {
        $logistic->deliverCargo($cargo);
    }

    public function air () {
        $logistic = new airLogistic();
        self::logistic($logistic, 'paper');
    }

    public function road () {
        $logistic = new RoadLogistic();
        self::logistic($logistic, 'aliexpress');
    }
}
