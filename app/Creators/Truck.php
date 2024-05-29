<?php

namespace App\Creators;

class Truck implements \App\Contracts\Transport
{

    public function load(): void
    {
        echo 'The truck is loading'. PHP_EOL;
    }

    public function deliver(string $cargo): void
    {
        echo 'The truck delivering '. $cargo . PHP_EOL;
    }

    public function unload(): void
    {
        echo 'the truck is unloading';
    }
}
