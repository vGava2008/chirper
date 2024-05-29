<?php

namespace App\Creators;

use App\Contracts\Transport;

class RoadLogistic extends Logistic
{

    public function getTransport(): Transport
    {
        return new Truck();
    }
}
