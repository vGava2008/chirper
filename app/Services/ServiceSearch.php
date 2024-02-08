<?php

namespace App\Services;

use App\Models\Service;

class ServiceSearch implements \App\Contracts\Search
{

    public function getServices(string $query)
    {
        return Service::search($query)->get();
    }
}
