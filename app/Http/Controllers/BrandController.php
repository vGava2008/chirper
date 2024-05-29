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

    public function show ($id)
    {
        return Inertia::render('Brand/Details', [
            'brand' => Brand::with('services')->get()->where('id', '=', $id)->first(),
        ]);
    }

    public function edit ($id)
    {
        return Inertia::render('Brand/Edit', [
            'brand' => Brand::with(['user','services'])->latest()->get()->where('id', '=', $id)->first(),
        ]);
    }

    public function update (Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:25500'],
            'email' => ['required', 'string', 'email', 'max:32'],
            'website' => ['required', 'string', 'max:50'],
            'phone_number' => ['required', 'string', 'max:50'],
        ]);
        $brand->update($validated);

//        return redirect()->route('login')->with('status', __(301));
//
//        return redirect()->route('brand', ['id' => $id]);
    }
}
