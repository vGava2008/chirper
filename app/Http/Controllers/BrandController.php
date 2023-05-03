<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BrandController extends Controller
{
    public function index ()
    {
        return Inertia::render('Brand/Index', [
            'brands' => Brand::with('user:id,name')->latest()->get(),
        ]);
    }
}
