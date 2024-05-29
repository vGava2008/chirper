<?php

namespace App\Creators;

use App\Contracts\Transport;

abstract class Logistic
{
    abstract public function getTransport(): Transport;

    public function deliverCargo (string $cargoName): void
    {
        $transport = $this->getTransport();
        $transport->load();
        $transport->deliver($cargoName);
        $transport->unload();
    }
}
