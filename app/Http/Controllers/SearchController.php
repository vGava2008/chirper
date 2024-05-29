<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class SearchController extends Controller
{

    public function index()
    {
        return Inertia::render('Search/Form');
    }
}
