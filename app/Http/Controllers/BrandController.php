<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BrandController extends Controller
{
    public function index ()
    {
        if (auth()->user()->admin) {
            return Inertia::render('Brand/Index', [
                'brands' => Brand::with('user:id,name')->latest()->get(),
            ]);
        }
        return Inertia::render('Brand/Index', [
            'brands' => Brand::with('user:id,name')->latest()->get()->where('user_id', '=', auth()->user()->id),
        ]);
    }
}
