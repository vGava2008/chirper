<?php

namespace App\Contracts;

interface QueryValidator
{
    public function checkVoid(string $query);
    public function checkInjection(string $query);
}
