<?php

namespace App\Contracts;

interface Transport
{
    public function load(): void;
    public function deliver(string $cargo): void;
    public function unload(): void;
}
