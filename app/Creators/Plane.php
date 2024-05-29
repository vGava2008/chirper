<?php

namespace App\Creators;

class Plane implements \App\Contracts\Transport
{

    public function load(): void
    {
        echo 'the plane is loading';
    }

    public function deliver(string $cargo): void
    {
        echo 'The plane delivering '. $cargo . PHP_EOL;
    }

    public function unload(): void
    {
        echo 'the plane is unloading';
    }
}
