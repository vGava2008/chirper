<?php

namespace App\Http\Controllers;

use Algolia\AlgoliaSearch\SearchClient;
use App\Services\ServiceSearch;
use Elasticsearch\ClientBuilder;
use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Inertia\Inertia;
use App\Models\Category;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return RedirectResponse
     */
    public function index()
    {
//        phpinfo();
        if (auth()->user()->hasRole('sAdmin')) {
            return Inertia::render('Services/Index', [
                'services' => Service::with(['user:id,name','category:id,name,slug'])->latest()->get(),
            ]);
        } elseif (auth()->user()->hasRole('admin')) {
            return Inertia::render('Services/Index', [
                'services' => Service::with(['user:id,name','brand:id,name'])->latest()->get()->where('user_id', '=', auth()->user()->id),
            ]);
        }
        return redirect()->route('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $categories = Category::get();
        return Inertia::render('Services/Create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:64',
            'description' => 'required|string|max:65535',
            'category' => ['required', 'exists:categories,id'],
            'phone_numbers' => 'required|string|max:65535',
        ]);

        $category = Category::find($validated['category']);
//        $validated['phone_numbers'] = array_values($validated['phone_numbers']);
        $serviceData = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'phone_numbers' => json_encode([$validated['phone_numbers']]),
        ];
        $category->services()->save($request->user()->services()->create($serviceData));
        return redirect('services');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Inertia\Response
     */
    public function show(int $id)
    {
        return Inertia::render('Services/Show', [
            'service' => Service::with(['user:id,name','brand:id,name'])->where('id', '=', $id)->latest()->get()->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Inertia\Response
     */
    public function edit(int $id)
    {
        return Inertia::render('Services/Edit', [
            'service' => Service::with(['user:id,name','brand:id,name'])->where('id', '=', $id)->latest()->get()->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $service  = Service::findOrFail($id);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:25500'],
            'category' => ['required', 'exists:categories,id'],

            'email' => ['string', 'email', 'max:32'],
            'website' => ['string', 'max:50'],
            'phone_number' => ['string', 'max:50'],
        ]);
        $service->update($validated);
        return $service;
    }

    /**
     * @param Service $service
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect(route('services.index'));
    }

    public function searching (Request $request) {
        return (new ServiceSearch())->getServices($request['query']);
        return  Service::search($request['query'])->get();
    }

}
