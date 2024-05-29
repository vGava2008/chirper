<?php

namespace App\Creators;

use App\Contracts\Transport;

class AirLogistic extends Logistic
{

    public function getTransport(): Transport
    {
        return new Plane();
    }
}
